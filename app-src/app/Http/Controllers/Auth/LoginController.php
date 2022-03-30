<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Lib\Atec365;
use App\Lib\TokenCache;
use App\Lib\TokenStore;
use App\Providers\RouteServiceProvider;
use Beta\Microsoft\Graph\Model\ProfilePhoto;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\User as U365; //Segurar Pedido 365
use App\Models\User;
use Microsoft\Graph\Model\Photo;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 4)) {
            return '/admin/';
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 1)) {
            return '/student/';
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 2)) {
            return '/teacher/';
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 3)) {
            return '/coordinator/';
        }
    }

    public function connect365()
    {
        $oauthClient = new GenericProvider([
            'clientId'                => config('azure.appId'),
            'clientSecret'            => config('azure.appSecret'),
            'redirectUri'             => config('azure.redirectUri'),
            'urlAuthorize'            => config('azure.authority') . config('azure.authorizeEndpoint'),
            'urlAccessToken'          => config('azure.authority') . config('azure.tokenEndpoint'),
            'urlResourceOwnerDetails' => '',
            'scopes'                  => config('azure.scopes')
        ]);
        $authUrl = $oauthClient->getAuthorizationUrl();
        //Guardar o estado para garantir segurança
        session(['oauthState' => $oauthClient->getState()]);
        return redirect()->away($authUrl);
    }

    public function callback365(Request $request)
    {
        //Validar estado
        $expectedState = session('oauthState');
        $request->session()->forget('oauthState');
        $providedState = $request->query('state');

        if (!isset($expectedState)) {
            // Se não há estado guardado da sessão
            // não fazer nada. O pedido de login não vei da mesma sessão
            return redirect()->route('home');
        }

        if (!isset($providedState) || $expectedState != $providedState) {
            return redirect()->route('login')
                ->with('error', 'Tentativa de acesso inválida!!! Tentativas de acesso não autorizado
                são comunicados às autoridades competentes');
        }

        // Obter o Código de Autorização, que significa que o login foi correto
        $authCode = $request->query('code');
        if (isset($authCode)) {
            // Inicializar o cliente
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => config('azure.appId'),
                'clientSecret'            => config('azure.appSecret'),
                'redirectUri'             => config('azure.redirectUri'),
                'urlAuthorize'            => config('azure.authority') . config('azure.authorizeEndpoint'),
                'urlAccessToken'          => config('azure.authority') . config('azure.tokenEndpoint'),
                'urlResourceOwnerDetails' => '',
                'scopes'                  => config('azure.scopes')
            ]);

            try {
                // Com o Código de autorização solicitar o Token que irá ser usado nos pedidos
                $accessToken = $oauthClient->getAccessToken('authorization_code', [
                    'code' => $authCode
                ]);
                TokenStore::storeTokens($accessToken);

            } catch (IdentityProviderException $e) {

                return redirect()->route('login')
                    ->with('error', 'Erro ao solicitar o token')
                    ->with('errorDetail', $e->getResponseBody());
            }
        }
        // Chegando aqui utilizador autenticou-se e foi guardado o seu token de acesso
        //Obter o Utilizador 365 (objeto da microsoft Graph)
        $u365 = Atec365::getLogged365User();
        $user = Atec365::getAppUser($u365);
        if (!$user) {
            //Apagar Tokens, este utilizador não pertence à plataforma
            TokenStore::clearTokens();
            //Retornar erro
            return redirect()->route('login')
                ->with('error', 'Utilizador não adicionado à aplicação')
                ->with('errorDetail', $u365->getUserPrincipalName() . ' efetuou login corretamente, contudo não foi adicionado como utilizador desta aplicação. Caso considere esta mensagem um erro, fale com o Administrador.');
        }

        //Verificar se é o primeiro Login
        //Caso não possua i ID 365
        if ($user->user365_id == '') {
            $user->user365_jobTitle = $u365->getJobTitle();
            $user->user_image_base64 = Atec365::getBase64ImageString();
            $user->user_name = $u365->getDisplayName();
            $user->update();
            //return dd($user);
            return view('first_login', [
                'user' => $user,
                'user365_id' => $u365->getId(),
            ]);
        }
        //Se chegamos aqui autenticar user e enviar para seu dashboard
        Auth::login($user);
        if ($user->reset) {
            //Para se fazer o reset da password
            return "reset Passord";
        }

        //Fazer redirect para o dashboard
        if (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 4)) {
            return redirect()->route('dashboardAdmin');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 1)) {
            return redirect()->route('studentsDashboard');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 2)) {
            return redirect()->route('teacherDashboard');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 3)) {
            return redirect()->route('coordinatorDashboard');
        }
    }

    public function firstTime(Request $request)
    {
        $user=User::find($request->user_id);
        //fazer validação dos campos
        //gravar id365 na base de dados
        $user->user365_id = $request->user_id365;
        //gravar  password
        $user->password = bcrypt($request->user_password);
        //gravar reset como false
        $user->reset = false;
        $user->update();
        //reencaminhar user para o seu dashboard
        Auth::login($user);
        if (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 4)) {
            return redirect()->route('dashboardAdmin');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 1)) {
            return redirect()->route('studentsDashboard');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 2)) {
            return redirect()->route('teacherDashboard');
        } elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id', 3)) {
            return redirect()->route('coordinatorDashboard');
        }
    }
}
