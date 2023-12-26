<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\HomeController;
use App\Http\Services\UploadService;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Group;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

/* Auth::routes(); */

Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class,'store']);
 
Route::middleware(['auth'])->group(function(){

    Route::prefix('/admin')->group(function(){
        
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('/main',[MainController::class,'index']);

        Route::prefix('/menu')->group(function(){

            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'list']);
            Route::DELETE('delete',[MenuController::class,'delete']);
            Route::get('edit/{id}',[MenuController::class,'edit']);
            Route::post('edit/{data}',[MenuController::class,'update']);

        });

        //Product
        Route::prefix('/product')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::DELETE('delete',[ProductController::class,'destroy']);
        });

        Route::prefix('/slider')->group(function(){
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{product}',[SliderController::class,'show']);
            Route::post('edit/{product}',[SliderController::class,'update']);
            Route::DELETE('delete',[SliderController::class,'destroy']);
        });

        //Upload
        /* Route::post('upload',[UploadController::class,'store']); */

    });
    
    
});
Route::get('/',[HomeController::class,'index']);

Route::post('/services/loadProduct',[HomeController::class,'loadMore']);


