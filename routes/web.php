<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);
Route::get('/contato', [ContatoController::class, 'contato']);
Route::get('/login', function(){return 'Login';});

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';});
    Route::get('/fornecedores', function(){return 'Fornecedores';});
    Route::get('/produtos', function(){return 'Produtos';});
});