<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthndicatedUser;
use App\Http\Middleware\GuestUser;
use App\Http\Middleware\LanaguageLocalization;
use Illuminate\Support\Facades\Route;

// Route::get('auther/all',[AutherController::class,'index'])->name('auther.index');
// Route::get('auther/{auther}/show',[AutherController::class,'show'])->name('auther.show');
// Route::delete('auther/{auther}/delete',[AutherController::class,'destroy'])->name('auther.destroy');
// Route::get('auther/create',[AutherController::class,'create'])->name('auther.create');
// Route::post('auther/store',[AutherController::class,'store'])->name('auther.store');
// Route::get('auther/{auther}/edit',[AutherController::class,'edit'])->name('auther.edit');
// Route::put('auther/{auther}/update',[AutherController::class,'update'])->name('auther.update');

// Route::prefix('auther')->group(function(){
//     Route::get('all',[AutherController::class,'index'])->name('auther.index');
//     Route::get('{auther}/show',[AutherController::class,'show'])->where('auther','[0-9]+')->name('auther.show');
//     Route::delete('{auther}/delete',[AutherController::class,'destroy'])->name('auther.destroy');
//     Route::get('create',[AutherController::class,'create'])->name('auther.create');
//     Route::post('store',[AutherController::class,'store'])->name('auther.store');
//     Route::get('{auther}/edit',[AutherController::class,'edit'])->name('auther.edit');
//     Route::put('{auther}/update',[AutherController::class,'update'])->name('auther.update');
// });

Route::get('/ar',[LanguageController::class,'ar'])->name('lang.ar');
Route::get('/en',[LanguageController::class,'en'])->name('lang.en');

Route::middleware(LanaguageLocalization::class)->group(function(){
    Route::middleware(AuthndicatedUser::class)->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('auther', AutherController::class);
    
        Route::get('/dashboard', [PanelController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
    
    Route::middleware(GuestUser::class)->group(function () {
        Route::get('/sign-up', [AuthController::class, 'signup'])->name('auth.signup');
        Route::post('/sign-up', [AuthController::class, 'handel_signup'])->name('auth.handel.signup');
    
        Route::get('/', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'handel_login'])->name('auth.handel.login');
    
        Route::get('/auth/redirect', [AuthController::class, 'github_rediredct'])->name('github');
        Route::get('/callback-url', [AuthController::class, 'github_callback']);
    });
});
