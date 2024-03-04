<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\logoutConroller;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('resturant/{id}' , [HomeController::class ,'resturant'])->name('resturant');
Route::get('/admin',[AdminController::class,'admin'])->middleware(['auth' , 'auth.role.admin']);
Route::get('/search',[HomeController::class ,'search'])->name('search');
Route::get('/category/{id}' , [HomeController::class , 'category'])->name('home.category');

Route::get('/basket/add/{product_id}/{resturant_id}' , [BasketController::class ,'add'])->name('basket.add')->middleware(['auth']);;
Route::get('/checkout/{user_id}' , [BasketController::class , 'checkout'])->name('basket.checkout');
Route::get('/basket/delete/{id}' , [BasketController::class , 'delete'])->name('basket.delete');
Route::get('/download',[HomeController::class ,'getDownload'])->name('download');


Route::get('admin/resturant/list',[AdminController::class ,'resturantList'])->name('resturant-list')->middleware(['auth' , 'auth.role.admin']);
Route::get('admin/resturant/create',[AdminController::class,'resturantCreate'])->name('resturant_Create')->middleware(['auth' , 'auth.role.admin']);
Route::post('admin/resturant/insert',[AdminController::class,'resturantInsert'])->name('resturant_insert')->middleware(['auth' , 'auth.role.admin']);
Route::get('admin/resturant/edit/{id}' ,[AdminController::class , 'resturantEdit']) ->name('resturant_edit')->middleware(['auth' , 'auth.role.admin']);
Route::post('admin/resturant/update',[AdminController::class,'resturantUpdate'])->name('resturant_update')->middleware(['auth' , 'auth.role.admin']);
Route::get('admin/resturant/update/{id}' , [AdminController ::class , 'resturantDelete']) -> name('resturant_delete')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/category/list', [AdminController::class, 'categoryList'])->name('category-list')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/category/create' , [AdminController::class , 'categoryCreate'])->name('category_Create')->middleware(['auth' , 'auth.role.admin']);
Route::post('/admin/category/insert' , [AdminController::class , 'categoryInsert']) -> name('category_insert')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/category/edit/{id}' ,[AdminController::class,'categoryEdit'])->name('category_edit')->middleware(['auth' , 'auth.role.admin']);
Route::post('/admin/category/update' ,[AdminController::class,'categoryUpdate'])->name('category_update')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/category/delete/{id}' , [AdminController::class ,'categoryDelete']) -> name('category_delete')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/product/list', [AdminController::class , 'productList'])->name('product-list')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/product/create' , [AdminController ::class , 'productCreate']) ->name('product_create')->middleware(['auth' , 'auth.role.admin']);
Route::post('/admin/product/insert' , [AdminController::class , 'productInsert']) ->name('product_insert')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/product/edit/{id}' , [AdminController::class,'productEdit'])-> name('product_edit')->middleware(['auth' , 'auth.role.admin']);
Route::post('/admin/product/update' , [AdminController::class , 'productUpdate'])->name('product_update')->middleware(['auth' , 'auth.role.admin']);
Route::get('/admin/product/delete/{id}' , [AdminController::class , 'productDelete']) -> name('product_delete')->middleware(['auth' , 'auth.role.admin']);



Auth::routes();

Route::get('/logout' , [logoutConroller::class ,'logout']) ->name('logout');

