<?php


use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contato;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use Illuminate\Console\Scheduling\Event;

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
Route::get('/', [ContatoController::class, 'index'],);
Route::get('/contatos/create', [ContatoController::class, 'create'], []);
Route::post('/contato', [ContatoController::class, 'store']);
Route::delete('/contatos/{id}', [ContatoController::class, 'destroy']);
Route::get('/contatos/{id}', [ContatoController::class, 'show']);
Route::get('/contatos/edit/{id}', [ContatoController::class, 'edit']);
Route::get('/contatos/excluir/{id}', [ContatoController::class, 'excluir']);
Route::put('/contatos/update/{id}', [ContatoController::class, 'update']);


