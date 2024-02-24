<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Http\Controllers\FrontpageController::class)->name('front');
Route::get('p/{id}.html', \App\Http\Controllers\Content\SingleController::class)->name('content.single');


Route::get('login', \App\Http\Controllers\Auth\LoginController::class)->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'handle'])->name('login.handle');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', \App\Http\Controllers\User\DashboardController::class)->name('user.dashboard');

    Route::get('editor', \App\Http\Controllers\Content\EditorController::class)->name('content.editor');

    Route::resource('content', \App\Http\Controllers\Content\ResourceController::class)
        ->only(['store', 'update', 'destroy']);
});


Route::get('sitemap.xml', \App\Http\Controllers\System\XmlSitemapController::class)->name('sitemap');

