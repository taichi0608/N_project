<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProductController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



// 部門マスターーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

Route::prefix('department')->name('department.')->group(function() {
    // 一覧表示
    Route::get('list', [DepartmentController::class, 'list'])->name('list');
    // 登録画面表示
    Route::get('create', [DepartmentController::class, 'create'])->name('create');
    // 登録
    Route::post('store', [DepartmentController::class, 'store'])->name('store');
    // 詳細表示
    Route::get('detail/{id}', [DepartmentController::class, 'detail'])->name('detail');
    // 編集表示
    Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
    Route::post('update', [DepartmentController::class, 'update'])->name('update');
    // 削除
    Route::post('delete', [DepartmentController::class, 'delete'])->name('delete');
});

// 部門マスターーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



// 集計部門マスターーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

Route::prefix('searching')->name('search.')->group(function() {

    // 一覧表示 検索機能あり--------------------------------------------------------------------
    Route::get('show', [ProductController::class, 'show'])->name('show');
    Route::get('index', [ProductController::class, 'search'])->name('index');

    // 新規作成フォーム表示 --------------------------------------------------------------------
    Route::get('create', [ProductController::class, 'create'])->name('create');
    // 登録
    Route::post('store', [ProductController::class, 'store'])->name('store');

    // 編集・削除フォーム表示 --------------------------------------------------------------------
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
    // 編集 --------------------------------------------------------------------
    Route::post('update', [ProductController::class, 'update'])->name('update');
    // 削除 --------------------------------------------------------------------
    Route::post('destroy', [ProductController::class, 'destroy'])->name('destroy');

});

// 集計部門マスターーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



