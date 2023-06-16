<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\VariaveisController;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.principal');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');

//Agrupando rotas.
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'fornecedor'])->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

//Redirecionamento de rotas.
Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');
Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Rota de fallback
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href='.route('site.principal').'>Voltar.</a>';
});

//Encaminhando variáveis para as views
Route::get('/variaveis', [VariaveisController::class, 'variaveis'])->name('site.variaveis');