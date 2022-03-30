<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Caso não esteja autenticado
        if(!Auth::check())
            return redirect()->route('login')
                ->with('msg_error','Necessita de estar autenticado e ser administrador para aceder a este recurso');

        //$route = Auth::user()->user_profile->first()->profile_id;
        //Está autenticado mas não é admin
        if(!auth()->user()->user_profiles->contains('profile_id',4))
            return redirect()->back()
                ->with('msg_error','Voce nao tem prefil de administrador! Entre com uma conta de administrador');

        
        return $next($request);
    }
}
