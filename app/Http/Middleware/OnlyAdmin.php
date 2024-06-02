<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('user')){
            return to_route('login')->with('message','Debes iniciar sesión');
        }
        $user=Session()->get('user');
        $tipo=$user->idrol;
        if($tipo!=1){
            return to_route('rubros.index');
        }
        return $next($request);
    }
}