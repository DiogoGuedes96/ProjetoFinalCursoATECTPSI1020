<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
    }

    protected function redirectTo(){
        if(Auth::check() && Auth::user()->user_profiles->contains('profile_id',4)){
            return '/admin/';
        } elseif(Auth::check() && Auth::user()->user_profiles->contains('profile_id',1)){
            return '/student/';
        }elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id',2)) {
            return '/teacher/';
        }elseif (Auth::check() && Auth::user()->user_profiles->contains('profile_id',3)) {
            return '/coordinator/';
        }

    }

}
