<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\CategoryCreate;
use App\Http\Livewire\BrandCreate;
use App\Http\Livewire\Counter;
use App\Http\Livewire\ProductsList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Auth::routes();
//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/categorias',CategoryCreate::class)->name('categorias');
    Route::get('/marcas',BrandCreate::class)->name('marcas');
    Route::resource('produto',ProductController::class);
    Route::get('/produtos',ProductsList::class)->name('produtos');
    Route::get('/counter',Counter::class)->name('counter');
});