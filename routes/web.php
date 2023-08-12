<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/', [LoginController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('auth');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //article categories
    Route::get('/dashboard/article-categories', [ArticleCategoryController::class, 'articleCategories'])->name('articleCategories');
    Route::post('/dashboard/article-categories', [ArticleCategoryController::class, 'createCategories'])->name('createCategories');
    Route::get('/dashboard/article-categories/{category}', [ArticleCategoryController::class, 'showArticleCategory'])->name('showArticleCategory');
    Route::post('/dashboard/article-categories/{category}', [ArticleCategoryController::class, 'editArticleCategory'])->name('editArticleCategory');

    //article
    Route::get('/dashboard/articles', [ArticleController::class, 'articles'])->name('articles');
    Route::post('/dashboard/articles', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::get('/dashboard/articles/{article}', [ArticleController::class, 'showArticle'])->name('showArticle');
    Route::post('/dashboard/articles/{article}', [ArticleController::class, 'editArticle'])->name('editArticle');

    //users
    Route::get('/dashboard/users', [UserController::class, 'users'])->name('users');
    Route::post('/dashboard/users', [UserController::class, 'createUser'])->name('createUser');
    Route::get('/dashboard/users/{user}', [UserController::class, 'showUser'])->name('showUser');
    Route::post('/dashboard/users/{user}', [UserController::class, 'editUser'])->name('editUser');


});





