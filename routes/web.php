<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\About;
use App\Models\Portfolio;
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


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');





Route::get('/', function () {
    $brands=Brand::all();
    $slide=Slider::all();
    $about=About::all();
    $port=Portfolio::all();
    return view('home',compact('brands','slide','about','port'));
});

Route::post('/insertproduct',[ProductController::class,'storeproduct'])->name("store");
Route::get('/eproduct/{id}',[ProductController::class,'editproduct'])->name("edit");
Route::post('/storeproduct/{id}',[ProductController::class,'editMe']);

Route::get('/softdelete/{id}',[ProductController::class,'delete']);
Route::get('/restore/{id}',[ProductController::class,'Restore']);
Route::get('/pdelete/{id}',[ProductController::class,'pdelete']);
Route::get('/myproduct',[ProductController::class,'insertproduct'])->name("product");




Route::get('/index',[CategoryController::class,'insertcat'])->name('insert');
Route::post('/insert',[CategoryController::class,'store'])->name('storecat');
Route::get('/edit/{id}',[CategoryController::class,'edit']);
Route::post('/editMe/{id}',[CategoryController::class,'editMe']);
Route::get('/delete/{id}',[CategoryController::class,'deleteme']);
Route::get('/restore/{id}',[CategoryController::class,'Restore']);
Route::get('/pdelete/{id}',[CategoryController::class,'pdelete']);





Route::get('/brand',[BrandController::class,'brand'])->name('brand_insert');
Route::post('/insert_brand',[BrandController::class,'create']);
Route::get('/brandedit/{id}',[BrandController::class,'edit']);
Route::post('/editme/{id}',[BrandController::class,'editme']);
Route::get('/branddelete/{id}',[BrandController::class,'delete']);
Route::get('/restore/{id}',[BrandController::class,'Restore']);
Route::get('/pdelete/{id}',[BrandController::class,'pdelete']);





Route::get('/insert_pic',[MultiController::class,'insert'])->name('insert_pic');
Route::post('/insert',[MultiController::class,'create'])->name('create');






Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () 
{Route::get('/dashboard',[UserController::class,'fetch'])->name('dashboard');
});
Route::get('/changepassword',[UserController::class,'create'])->name('changepass');
Route::post('/update_password',[UserController::class,'update'])->name('update_pass');
Route::get('/change_profile',[UserController::class,'changeprofile'])->name('changeprofile');
Route::post('/update_profile',[UserController::class,'updateprofile'])->name('updateprofile');




Route::get('/userlogout',[BrandController::class,'logout'])->name('user.logout');




Route::get('/index',[SliderController::class,'insertslide'])->name('insert');
Route::get('/create',[SliderController::class,'create']);
Route::post('/store',[SliderController::class,'store'])->name('storeslider');
Route::get('/edit/{id}',[SliderController::class,'edit']);
Route::post('/editme/{id}',[SliderController::class,'editslider']);
Route::get('/deleteme/{id}',[SliderController::class,'deleteslider']);



Route::get('/insertabout',[AboutController::class,'insertabout'])->name('insert_about');
Route::get('/create',[AboutController::class,'create']);
Route::post('/store',[AboutController::class,'store'])->name('storeabout');
Route::get('/edit/{id}',[AboutController::class,'edit']);
Route::post('/editme/{id}',[AboutController::class,'editabout']);
Route::get('/deleteme/{id}',[AboutController::class,'deleteabout']);


Route::get('/insert_pics',[PortfolioController::class,'insert'])->name('insert_pic');
Route::post('/insert',[PortfolioController::class,'create'])->name('create');




Route::get('/portfolio',[FrontendController::class,'portfolio'])->name('portfolio');
Route::get('/portfoliod',[FrontendController::class,'portfoliodetails'])->name('portfoliod');



Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/insert_contact',[ContactController::class,'create']);