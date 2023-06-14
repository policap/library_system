<?php

use App\Http\Controllers\Admin\BookResource;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Auth\CustomLogin;
use App\Http\Controllers\HomeController;
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
    return view('public.index');
});

//Auth::routes();
Route::post('login',[CustomLogin::class, 'login'])->name('login');
Route::get('login',[CustomLogin::class, 'show']);

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function (){
    Route::get('', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    Route::get('staff',[StaffController::class,'index'])->name('staff.index');
    Route::get('staff/create',[StaffController::class,'create'])->name('staff.create');
    Route::post('staff/create',[StaffController::class,'save']);
    Route::get('staff/photo/{user_id}',[StaffController::class,'set_photo'])->name('staff.photo');
    Route::post('staff/photo/{user_id}',[StaffController::class,'save_photo']);
    Route::get('staff/edit/{id}',[StaffController::class,'edit'])->name('staff.edit');
    Route::post('staff/edit/{id}',[StaffController::class,'update']);
    Route::get('staff/delete/{id}',[StaffController::class,'delete'])->name('staff.delete');
    Route::post('staff/statistics',[StaffController::class,'statistics'])->name('staff.statistics');
    Route::get('staff/{id}',[StaffController::class,'show'])->name('staff.show');

    Route::get('books/search', [BookResource::class,'search'])->name('books.search');
    Route::get('books/do_search', [BookResource::class,'do_search'])->name('books.do_search');
    Route::resource('/books', BookResource::class);
    Route::resource('/visitors', VisitorController::class);
    
    Route::post('book/statistics',[BookResource::class, 'statistics'])->name('books.statistics');
    
});
