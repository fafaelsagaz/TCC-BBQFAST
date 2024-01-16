<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TelaDeAcessoController;
use App\Http\Controllers\HomePrestadorController;
use App\Http\Controllers\AlteracaodeSenhaController;
use App\Http\Controllers\homeClienteController;
use App\Http\Controllers\CrieSeuEventoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PerfilClienteController;
use App\Http\Controllers\PerfilPrestadorController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ChurrasqueiroController;
use App\Http\Controllers\AgendamentoClienteController;
use App\Http\Controllers\BuffetController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\ChurrasapoioController;
use App\Http\Controllers\AvalieComentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PlanosController;
use App\Http\Controllers\CadastroPrestadorController;
use App\Http\Controllers\PedidosController;
use App\http\Controllers\EventoClienteController;
use App\http\Controllers\TelaInicialController;



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

Route::get('/', [TelaInicialController::class, 'TelaInicial'])->name('inicio');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/cliente', [homeClienteController::class, 'homeCliente']);
Route::get('/prestador', [HomePrestadorController::class, 'homePrestador']);
Route::get('/alterarsenha', [AlteracaodeSenhaController::class, 'AlteracaodeSenha']);



Route::get('/cliente', function () {
    return view('homeCliente');
})->middleware(['auth', 'verified'])->name('autenticacaoCliente');

Route::get('/prestador', function () {
    return view('homePrestador');
})->middleware(['auth', 'verified'])->name('autenticacaoPrestador');


Route::get('/banco', function () {
    $eventos = Evento::first();




    $eventos->user()->get();

    dd($eventos);
});
Route::middleware('auth')->group(function () {

    Route::get('/home', [TelaDeAcessoController::class, 'teladeAcesso'])->name('teladeAcesso');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/crieevento', [CrieSeuEventoController::class, 'CrieSeuEvento']);
    Route::post('/evento', [EventoController::class, 'index'])->name('index');
    Route::post('/evento', [EventoController::class, 'show'])->name('evento.show');
    Route::post('/evento', [EventoController::class, 'store'])->name('evento.store');
    Route::get('/evento', [EventoController::class, 'create'])->name('evento.create');



    Route::get('/eventocliente', [EventoClienteController::class, 'EventoCliente'])->name('index');
    Route::post('/eventocliente', [EventoClienteController::class, 'store'])->name('eventocliente.store');
    Route::get('/eventocliente', [EventoClienteController::class, 'create'])->name('eventocliente.create');


    Route::post('/cadastroprestador', [EventoController::class, 'CadastroPrestador'])->name('CadastroPrestador');
    Route::get('/cadastroprestador', [CadastroPrestadorController::class, 'create'])->name('cadastroprestador.create');
    Route::post('/cadastroprestador', [CadastroprestadorController::class, 'store'])->name('cadastroprestador.store');

    Route::get('/perfilcliente', [PerfilClienteController::class, 'indexc'])->name('perfilc.indexc');
    Route::get('/perfilcliente/{id}', [PerfilClienteController::class, 'showc'])->name('perfilc.showc');
    Route::get('/perfil-cliente/create', [PerfilClienteController::class, 'createc'])->name('perfilc.createc');
    Route::post('/perfilcliente', [PerfilClienteController::class, 'storec'])->name('perfilc.storec');
    Route::get('/perfilcliente/{id}/edit', [PerfilClienteController::class, 'editc'])->name('perfilc.editc');
    Route::put('/perfilcliente/{id}', [PerfilClienteController::class, 'updatec'])->name('perfilc.updatec');

    Route::get('/perfilprestador', [PerfilPrestadorController::class, 'indexp'])->name('perfilp.indexp');
    Route::get('/perfilprestador/{id}', [PerfilPrestadorController::class, 'showp'])->name('perfilp.showp');
    Route::get('/perfil-prestador/create', [PerfilPrestadorController::class, 'createp'])->name('perfilp.createp');
    Route::post('/perfilprestador', [PerfilPrestadorController::class, 'storep'])->name('perfilp.storep');
    Route::get('/perfilprestador/{id}/edit', [PerfilPrestadorController::class, 'editp'])->where('id', '[0-9]+')->name('perfilp.editp');
    Route::put('/perfilprestador/{id}', [PerfilPrestadorController::class, 'updatep'])->where('id', '[0-9]+')->name('perfilp.updatep');

    Route::get('/dash', [DashBoardController::class, 'DashBoard']);
    Route::get('/agendamento', [AgendamentoController::class, 'Agendamento']);
    Route::get('/churrasqueiro', [ChurrasqueiroController::class, 'Churrasqueiro']);
    Route::get('/agendamentocliente', [AgendamentoClienteController::class, 'AgendamentoCliente']);





    Route::get('/buffet', [BuffetController::class, 'Buffet']);
    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos');
    Route::get('/apoio', [ChurrasapoioController::class, 'Churrasapoio']);
    Route::get('/planos', [PlanosController::class, 'index'])->name('planos.index');
    Route::post('/planos', [PlanosController::class, 'store'])->name('planos.store');
    Route::get('/calculadora', [CalculadoraController::class, 'Calculadora']);
    Route::get('/avaliar', [AvalieComentController::class, 'AvalieComent']);

    // Route for recusarPedido
    Route::post('/recusar-pedido/{pedidoId}', [PedidosController::class, 'recusarPedidoEListarEventos'])->name('recusar.pedido');
    // Route for aceitarPedido
    Route::post('/aceitar-pedido/{pedidoId}', [PedidosController::class, 'aceitarPedido'])->name('aceitar.pedido');

    Route::get('/prestador/eventos-aceitos', [AgendamentoController::class, 'eventosAceitos'])
    ->name('prestador.eventos-aceitos');
});

route::fallback(function () {
    return "Erro na Rota! Vá Verificar!";
});

require __DIR__ . '/auth.php';
