<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
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

        //Está autenticado mas não é admin
        if(!auth()->user()->user_profiles->contains('profile_id',2))
            return redirect()->route('login')
                ->with('msg_error','Voce nao tem prefil de Formador! Entre com uma conta de Formador');

                
        return $next($request);
    }
}
