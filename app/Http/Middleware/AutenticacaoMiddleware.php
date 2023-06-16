<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao): Response
    {
        echo $metodo_autenticacao.'<br>';

        //Manipulando a resposta de uma requisição.
        $resposta = $next($request);
        dd($resposta);
        
        return Response('Acesso negado!');
        //return $next($request);
    }
}
