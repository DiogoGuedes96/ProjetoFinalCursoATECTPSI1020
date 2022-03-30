<?php

namespace App\Lib;

use Microsoft\Graph\Model\User as U365; //Segurar Pedido 365
use App\Models\User;
use Illuminate\Support\Str;
use Microsoft\Graph\Graph;

/**
 * Biblioteca de Funções para automatizar pedidos MSGrph
 */
class Atec365
{
    /**
     * definição de Endpoints para Api
     */

    //Endpoint para Perfil
    private const ME = '/me';

    //Endpoint para dados da foto
    private const PHOTO_META = '/me/photo"';

    //Endpoint para
    private const PHOTO_RAW = '/me/photos/96x96/\$value';

    /**
     * Retorna o Utilizador 365 consumindo os token em sessão
     * @return U365|null
     */
    public static function getLogged365User()
    {
        $token = TokenStore::getAccessToken();
        if ($token == '')
            return null;
        $graph = new Graph();
        $graph->setAccessToken($token);
        $user = $graph->createRequest('GET', SELF::ME)
            ->setReturnType(U365::class)
            ->execute();
        return $user;
    }

    /**
     * Retorna str a colocar na src da Imagem
     * Exemplo: <img src="$value" />
     * @return str
     */
    public static function getBase64ImageString()
    {
        $token = TokenStore::getAccessToken();
        if ($token == '')
            return null;
        $graph = new Graph();
        $graph->setAccessToken($token);
        //get photo
        $photo = $graph->createRequest('GET', self::PHOTO_RAW)->execute();
        $photo = $photo->getRawBody();
        //get photo meta
        $meta = $graph->createRequest("GET", '/me/photos/96x96')->execute();
        $meta = $meta->getBody();
        return 'data:'.$meta["@odata.mediaContentType"].';base64,'.base64_encode($photo);
    }

    /**
     * Retorna o Utilizador da Aplicação que corresponde ao login 365
     * @return User|null
     */
    public static function getAppUser(U365 $u_365)
    {
        return User::where('email', Str::lower($u_365->getUserPrincipalName()))->first();
    }
}
