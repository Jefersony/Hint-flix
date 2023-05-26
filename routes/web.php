<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FilmeController::class, 'exibirFormulario'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get( '/cadastrar-filme', function(){
    return view('cadastro-filme');
})->middleware(['auth', 'verified'])->name('cadastrar-filme');

Route::post('/novo-filme-cadastrar', [FilmeController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('novo-filme-cadastrar');

// Rota equivalente à dashboard
Route::get('/buscar-filmes', [FilmeController::class, 'exibirFormulario'])
    ->middleware(['auth', 'verified'])->name('buscar-filmes');

Route::get('/trazer-filmes', [FilmeController::class, 'getFilmes'])
    ->middleware(['auth', 'verified'])->name('trazer-filmes');