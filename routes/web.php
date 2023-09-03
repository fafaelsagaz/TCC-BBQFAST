<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelaDeAcessoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[TelaDeAcessoController::class,'TeladeAcesso']);
Route::get('/login',[LoginController::class,'Login']);
Route::get('/cadastro',[CadastroController::class,'Cadastro']);