<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Category\IndexController as IndexCategoryController;

use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;

use App\Http\Controllers\Admin\Tag\EditController as EditTagController;
use App\Http\Controllers\Admin\Tag\ShowController as ShowTagController;
use App\Http\Controllers\Admin\Tag\StoreController as StoreTagController;
use App\Http\Controllers\Admin\Tag\CreateController as CreateTagController;
use App\Http\Controllers\Admin\Tag\DeleteController as DeleteTagController;
use App\Http\Controllers\Admin\Tag\IndexController as IndexTagController;

use App\Http\Controllers\Admin\Post\EditController as EditPostController;
use App\Http\Controllers\Admin\Post\ShowController as ShowPostController;
use App\Http\Controllers\Admin\Post\StoreController as StorePostController;
use App\Http\Controllers\Admin\Post\CreateController as CreatePostController;
use App\Http\Controllers\Admin\Post\DeleteController as DeletePostController;
use App\Http\Controllers\Admin\Post\IndexController as IndexPostController;

use App\Http\Controllers\Admin\User\EditController as EditUserController;
use App\Http\Controllers\Admin\User\ShowController as ShowUserController;
use App\Http\Controllers\Admin\User\StoreController as StoreUserController;
use App\Http\Controllers\Admin\User\CreateController as CreateUserController;
use App\Http\Controllers\Admin\User\DeleteController as DeleteUserController;

use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Personal\Main\IndexController as PersonalIndexController;
use App\Http\Controllers\Personal\Liked\IndexController as PersonalLikedIndexController;
use App\Http\Controllers\Personal\Comment\IndexController as PersonalCommentIndexController;
use App\Http\Controllers\Admin\Main\IndexController as TagIndexController;
use App\Http\Controllers\Comment\StoreController as PostCommentsController;
use App\Http\Controllers\Like\StoreController as PostLikesController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryController;
use App\Http\Controllers\Category\Post\IndexController as CategoryStoreController;
use App\Http\Controllers\Category\Post\IndexController as CategoryPostController;
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
Route::get('/aziz/1/aziz', function(){
    return view('aziz.aziz');
});

Route::get('/', [IndexController::class, 'index'])->name('main.index');
Route::get('/categories', [IndexCategoryController::class, 'index'])->name('category.index');
Route::prefix('categories')->group(function (){
    Route::get('/{category}/posts', [CategoryStoreController::class, 'index'])->name('category.post.index' );
});

// Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function (){
    
//     Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function (){
//         Route::get('/', 'IndexController')->name('category.post.index');
//     });

// });


Route::resource('posts.comments', PostCommentsController::class);
Route::resource('posts.likes', PostLikesController::class);
Route::get('/posts/{post}', [PostIndexController::class, 'show'])->name('post.show');

Route::prefix('personal')->name('personal.')->middleware('auth', 'verified')->group(function () {
    Route::get('/', [PersonalIndexController::class, 'index'])->name('main.index');
    Route::get('/liked', [PersonalLikedIndexController::class, 'index'])->name('liked.index');
    Route::delete('/liked/{post}', [PersonalLikedIndexController::class, 'delete'])->name('liked.delete');
    
    // Comments routes
    Route::get('/comments', [PersonalCommentIndexController::class, 'index'])->name('comments.index');
    Route::get('/comments/{comment}', [PersonalCommentIndexController::class, 'edit'])->name('comments.edit');
    Route::patch('/comments{comment}', [PersonalCommentIndexController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [PersonalCommentIndexController::class, 'delete'])->name('comments.delete');
});   
 
Route::prefix('admin')->name('admin.')->middleware('auth','admin', 'verified')->group(function () {
Route::get('/', [AdminIndexController::class, 'index'])->name('main.index');

// Post routes
Route::prefix('posts')->name('post.')->group(function () {
    Route::get('/', [IndexPostController::class, 'index'])->name('index');
    Route::get('/create', [CreatePostController::class, 'index'])->name('create');
    Route::post('/', [StorePostController::class, 'index'])->name('store');
    Route::get('/{post}', [ShowPostController::class, 'index'])->name('show');
    Route::get('/{post}/edit', [EditPostController::class, 'index'])->name('edit');
    Route::patch('/{post}', [EditPostController::class, 'update'])->name('update');
    Route::delete('/{post}', [DeletePostController::class, 'delete'])->name('delete');
});

// Category routes
Route::prefix('categories')->name('category.')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'category'])->name('index');
    Route::get('/create', [CreateController::class, 'index'])->name('create');
    Route::post('/', [StoreController::class, 'index'])->name('store');
    Route::get('/{category}', [ShowController::class, 'index'])->name('show');
    Route::get('/{category}/edit', [EditController::class, 'index'])->name('edit');
    Route::patch('/{category}', [EditController::class, 'update'])->name('update');
    Route::delete('/{category}', [DeleteController::class, 'delete'])->name('delete');
});

// Tags routes
Route::prefix('tags')->name('tag.')->group(function () {
    Route::get('/', [IndexTagController::class, 'index'])->name('index');
    Route::get('/create', [CreateTagController::class, 'index'])->name('create');
    Route::post('/', [StoreTagController::class, 'index'])->name('store');
    Route::get('/{tag}', [ShowTagController::class, 'index'])->name('show');
    Route::get('/{tag}/edit', [EditTagController::class, 'index'])->name('edit');
    Route::patch('/{tag}', [EditTagController::class, 'update'])->name('update');
    Route::delete('/{tag}', [DeleteTagController::class, 'delete'])->name('delete');
});

Route::prefix('users')->name('user.')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'user'])->name('index');
    Route::get('/create', [CreateUserController::class, 'index'])->name('create');
    Route::post('/', [StoreUserController::class, 'index'])->name('store');
    Route::get('/{user}', [ShowUserController::class, 'index'])->name('show');
    Route::get('/{user}/edit', [EditUserController::class, 'index'])->name('edit');
    Route::patch('/{user}', [EditUserController::class, 'update'])->name('update');
    Route::delete('/{user}', [DeleteUserController::class, 'delete'])->name('delete');
});

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);

