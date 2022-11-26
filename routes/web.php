<?php

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;
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

Route::get('/', [IndexController::class, 'index']);

Route::prefix('admin')->group(function () {
Route::get('/', [AdminIndexController::class, 'index']);
Route::prefix('categories')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'category'])->name('category.index');
    Route::get('/create', [CreateController::class, 'category'])->name('category.create');
});
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
