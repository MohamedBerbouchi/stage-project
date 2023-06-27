<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has("utilisateur")){
            return redirect("login")->with("fail", " Vous devez vous connecter d'abord");

        }
        // dd(Session()->get('utilisateur')->role);
        if(Session()->get('utilisateur')->role == "admin"){
            return $next($request);
        }else{
             return redirect("home");
        }
       
    }
}
