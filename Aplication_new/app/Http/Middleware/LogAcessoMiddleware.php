<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
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
        session_start();
       if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != ''){
            return $next($request); 
       }else{
           $erro = 2;
           return redirect()->route('resources.views.index', ['erro' => $erro]);
           
       }
         
     
    }
}
