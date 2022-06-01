<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportsController;
use App\Models\Reports;
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

Route::middleware('auth')->group(function (){
    Route::resource('admin', AdminController::class);
    Route::get('profile', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
    Route::post('/admin/change_status',[AdminController::class,'change_status'])->name('admin.change_status');
    Route::get('admin/Reports/complete', [App\Http\Controllers\AdminController::class, 'complete'])->name('admin.complete.report');
    Route::get('admin/Reports/incomplete', [App\Http\Controllers\AdminController::class, 'incomplete'])->name('admin.incomplete.report');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('reports', ReportsController::class);
    Route::post('/upload/report', [App\Http\Controllers\ReportsController::class, 'upload_report'])->name('upload.report.store');
    Route::post('/close/Report', [App\Http\Controllers\ReportsController::class, 'close_report'])->name('close.report.store');
    Route::get('/Reports/complete', [App\Http\Controllers\ReportsController::class, 'complete'])->name('complete.report');
    Route::get('/Reports/incomplete', [App\Http\Controllers\ReportsController::class, 'incomplete'])->name('incomplete.report');
    Route::post('/comment', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.store');
});













Auth::routes();


