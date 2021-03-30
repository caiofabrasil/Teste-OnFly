<?php

use App\Http\Controllers\DespesasController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

//Rotas de Registro
Route::get('/', [\App\Http\Controllers\UsuarioController::class, 'First'])->name('site.first'); //Rota Principal
Route::get('/Login/{erro?}', [\App\Http\Controllers\UsuarioController::class, 'index']) //Rotas de Login 
->name('resources.views.index');
Route::post('/Login', [\App\Http\Controllers\UsuarioController::class, 'Login'])->name('site.index');
Route::get('/Registrar/{erro?}', [\App\Http\Controllers\Registrar::class, "index"])->name('site.registrar'); //Rota de Registro
Route::post('/Registrar', [\App\Http\Controllers\UsuarioController::class, "Registrar"])->name('site.registrar2');
Route::get('/LogOut' , [\App\Http\Controllers\UsuarioController::class, "LogOut"])->name('site.logout'); //Rota de LogOut


//Rotas de Despesas
Route::get('/Despesas', [\App\Http\Controllers\DespesasController::class, "index"])->name('Despesas_Rota')
->middleware(LogAcessoMiddleware::class);
Route::post('/Despesas/{id}', [\App\Http\Controllers\DespesasController::class, "update"])
->middleware(LogAcessoMiddleware::class);
Route::resource('/Despesas', DespesasController::class)->except('destroy')
->middleware(LogAcessoMiddleware::class);
Route::get('/Despesas/{id}/delete', [\App\Http\Controllers\DespesasController::class, "destroy"])->name('modelos.destroy')
->middleware(LogAcessoMiddleware::class);



