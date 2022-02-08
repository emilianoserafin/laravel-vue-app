<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PropertiesController;

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
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum', 'verified')->group(function () {

    Route::get('/dashboard/properties', [PropertiesController::class, 'index']);
    Route::get('/properties/create', [PropertiesController::class, 'create']);
    Route::post('/properties', [PropertiesController::class, 'store']);

    Route::get('/dashboard/services', function () {
        return Inertia::render('Services');
    });
});
