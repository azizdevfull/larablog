<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;

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

Route::prefix('admin')->name('admin.')->group(function () {
Route::get('/', [AdminIndexController::class, 'index']);
Route::prefix('categories')->name('category.')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'category'])->name('index');
    Route::get('/create', [CreateController::class, 'index'])->name('create');
    Route::post('/', [StoreController::class, 'index'])->name('store');
    Route::get('/{category}', [ShowController::class, 'index'])->name('show');
});
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
