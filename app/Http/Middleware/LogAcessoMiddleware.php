<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Logs;
use DateTime;
use GuzzleHttp\Middleware;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        // $data = DateTime::createFromFormat('yy/mm/dd hh:ii:ss',now());
        $data = now();
        
        Logs::create([
            'acao'=>'Acesso de rota',
            'descricao'=>"Acesso realizado a rota $rota pelo IP $ip",
            'data'=>$data
        ]);
        
        // return Response('Middleware');
        // $resposta = $next($request);
        // $resposta->setStatusCode(201, 'O Teste');
        return $next($request);
    }
}
