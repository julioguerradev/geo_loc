<?php

use Inertia\Inertia;
use App\Models\Rodovias;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UfController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TechosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RodoviaController;
use App\Http\Controllers\TrechosController;

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

Route::get('/', [TrechosController::class, 'index']);
Route::resource('trechos', TrechosController::class);


Route::get('/ufs', [UfController::class, 'index']);
Route::get('/rodovias', [RodoviaController::class, 'index']);

Route::get('/getRodovias/{uf}', [RodoviaController::class, 'getRodoviasByUf']);



require __DIR__.'/auth.php';

