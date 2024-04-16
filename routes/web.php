<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('site.login');
});


Route::prefix('/site')->group(function () {
    Route::get('/{erro?}/{aviso?}', 'App\Http\Controllers\UsuarioController@login')->name('site.login');
    Route::post('/login', 'App\Http\Controllers\UsuarioController@autenticar')->name('site.login');
});

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', 'App\Http\Controllers\PrincipalController@principal')->name('app.index');
    Route::get('/sair', 'App\Http\Controllers\UsuarioController@logout')->name('app.sair');
    Route::get('/estoque', 'App\Http\Controllers\EstoqueController@estoque')->name('app.estoque');
    
    // ------ Cliente ------
    // Listar
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@listar')->name('app.cliente.index');
    // Alterar
    Route::get('/cliente/alterar/{id_cliente}', 'App\Http\Controllers\ClienteController@edit')->name('app.cliente.edit');
    Route::put('/cliente/alterar', 'App\Http\Controllers\ClienteController@update')->name('app.cliente.update');
    // Deletar
    Route::get('/cliente/deletar/{id_cliente}', 'App\Http\Controllers\ClienteController@deletar')->name('app.cliente.deletar');
    // Cadastrar
    Route::get('/cliente/cadastrar', 'App\Http\Controllers\ClienteController@cadastro')->name('app.cliente.cadastro');
    Route::post('/cliente/store', 'App\Http\Controllers\ClienteController@store')->name('app.cliente.store');
    // --------------------

    // ------ Usuario ------
    // Listar
    Route::get('/usuario', 'App\Http\Controllers\UsuarioController@listar')->name('app.usuario.index');
    // Alterar
    Route::get('/usuario/alterar/{id_usuario}', 'App\Http\Controllers\UsuarioController@edit')->name('app.usuario.edit');
    Route::put('/usuario/alterar', 'App\Http\Controllers\UsuarioController@update')->name('app.usuario.update');
    // Deletar
    Route::get('/usuario/deletar/{id_usuario}', 'App\Http\Controllers\UsuarioController@deletar')->name('app.usuario.deletar');
    // Cadastrar
    Route::get('/usuario/cadastrar', 'App\Http\Controllers\UsuarioController@cadastro')->name('app.usuario.cadastro');
    Route::post('/usuario/store', 'App\Http\Controllers\UsuarioController@store')->name('app.usuario.store');
    // --------------------

    // ------ Aparelho Ip ------
    // Listar
    Route::get('/aparelhoIp', 'App\Http\Controllers\AparelhoIpController@listar')->name('app.aparelhoIp.index');
    // Alterar
    Route::get('/aparelhoIp/alterar/{id_aparelho_ip}', 'App\Http\Controllers\AparelhoIpController@edit')->name('app.aparelhoIp.edit');
    Route::put('/aparelhoIp/alterar', 'App\Http\Controllers\AparelhoIpController@update')->name('app.aparelhoIp.update');
    // Deletar
    Route::get('/aparelhoIp/deletar/{id_aparelho_ip}', 'App\Http\Controllers\AparelhoIpController@deletar')->name('app.aparelhoIp.deletar');
    // Cadastrar
    Route::get('/aparelhoIp/cadastrar', 'App\Http\Controllers\AparelhoIpController@cadastro')->name('app.aparelhoIp.cadastro');
    Route::post('/aparelhoIp/store', 'App\Http\Controllers\AparelhoIpController@store')->name('app.aparelhoIp.store');
    // --------------------
});

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('app.index').'">Clique aqui para volta para a pagina inicial</a>';
});