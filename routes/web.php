<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\CctController;
use App\Http\Controllers\UserController;

use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum')->name('admin.')->prefix('admin')->group(function () {
    // Route::get('/create', [CasoController::class, 'create'])->name('casos/create');
    Route::get(
        '/casos/create',
        [CasoController::class, 'create']
    )->name('casos/create');
    Route::get('/casos/', [CasoController::class, 'indexMpio'])->name('casos/');
    Route::get('/casos/{caso:uuid}/edit', [CasoController::class, 'edit'])->name('casos/edit');
    Route::put('/casos/{caso:uuid}', [CasoController::class, 'update'])->name('casos/update');
    Route::patch('/casos/cerrarcaso/{caso:uuid}', [CasoController::class, 'closeCaso'])->name('casos/cerrarcaso');
    Route::post(
        '/casos',
        [CasoController::class, 'store']
    )->name('casos/store');
    Route::get(
        '/cct/{cct}/find/',
        [CctController::class, 'findcct']
    )->name('casos/create');
    Route::get('casos/export/',  [CasoController::class, 'export'])->name('casos/export');

    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios/create');
    Route::post('/usuarios', [Usercontroller::class, 'store'])->name('usuarios/store');
    Route::get('/usuarios/', [UserController::class, 'index'])->name('usuarios/');
    Route::get('/usuarios/{usuario:id}/edit', [Usercontroller::class, 'edit'])->name('usuarios/edit');
});
