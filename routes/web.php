<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;

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

Route::prefix('department')->group(function() {
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




// 部門集計ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// 一覧表示
Route::get('/summary_section/list', [SummarySectionController::class, 's_list'])->name('s_list');
// 登録画面表示
Route::get('/summary_section/create', [SummarySectionController::class, 's_create'])->name('s_create');
// 登録
Route::post('/summary_section/store', [SummarySectionController::class, 's_store'])->name('s_store');
// 詳細表示
Route::get('/summary_section/detail/{id}', [SummarySectionController::class, 's_detail'])->name('s_detail');
// 編集表示
Route::get('/summary_section/edit/{id}', [SummarySectionController::class, 's_edit'])->name('s_edit');
Route::post('/summary_section/update', [SummarySectionController::class, 's_update'])->name('s_update');
// 削除
Route::post('/summary_section/delete/{id}', [SummarySectionController::class, 's_delete'])->name('s_delete');

// 絞込み検索
// Route::get('show', [SummarySectionController::class, 'show'])->name('show');
// Route::get('search', [SummarySectionController::class, 'search'])->name('search');