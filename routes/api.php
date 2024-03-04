<?php

use App\Http\Controllers\AdminCategoryApiController;
use App\Http\Controllers\AdminProductApiController;
use App\Http\Controllers\AdminResturantApiController;
use App\Http\Controllers\FrontApiController;
use App\Http\Controllers\UserApiControllers;
use App\Http\Controllers\BasketController;
use App\Models\resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//********************************USER************************************************************** */
    Route::post('/register',[UserApiControllers::class, 'register']);
    Route::post('/login' , [UserApiControllers::class , 'login']);
    Route::get('/logout' , [UserApiControllers::class ,'logout'])->middleware('auth:sanctum');
    Route::get('/ShowUser' , [UserApiControllers::class , 'showUser']);
//************************************************************************************************* */


//********************************Category************************************************************** */
    Route::get('/admin/categories' , [AdminCategoryApiController ::class ,'index'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::get('/admin/categories/{id}' , [AdminCategoryApiController ::class ,'show'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::post('/admin/categories' , [AdminCategoryApiController ::class ,'create'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::put('/admin/categories/{id}' , [AdminCategoryApiController ::class ,'update'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::delete('/admin/categories/{id}' , [AdminCategoryApiController ::class ,'delete'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
//************************************************************************************************* */


//********************************Restaurant************************************************************** */
    Route::get('/admin/resturants' , [AdminResturantApiController ::class ,'index'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::get('/admin/resturants/{id}' , [AdminResturantApiController ::class ,'show'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::post('/admin/resturants' , [AdminResturantApiController ::class ,'create'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::put('/admin/resturants/{id}' , [AdminResturantApiController ::class ,'update'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::delete('/admin/resturants/{id}' , [AdminResturantApiController ::class ,'delete'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
//************************************************************************************************* */


//********************************Product************************************************************** */
    Route::get('/admin/products' , [AdminProductApiController ::class ,'index'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::get('/admin/products/{id}' , [AdminProductApiController ::class ,'show'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::post('/admin/products' , [AdminProductApiController ::class ,'create'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::put('/admin/products/{id}' , [AdminProductApiController ::class ,'update'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
    Route::delete('/admin/products/{id}' , [AdminProductApiController ::class ,'delete'])->middleware(['auth:sanctum', 'auth.role.admin.json' ]);
//************************************************************************************************* */


//********************************ّFRONT************************************************************** */
Route::get('/resturants/search/{q}' ,[FrontApiController::class ,'search']);
Route::get('/front',[FrontApiController::class ,'index']);
Route::get('/front/resturant/{id}' ,[FrontApiController::class ,'resturant'] );
Route::get('/front/wallet/{price}' , [FrontApiController::class , 'wallet'])->middleware(['auth:sanctum']);
Route::get('/front/category/{id}' , [FrontApiController::class , 'category']);

Route::get('/admin/resturants' , [AdminResturantApiController ::class ,'showAllRestaurant']);

Route::get('/basket/delete/{id}' , [BasketController::class , 'deleteJson'])->middleware(['auth:sanctum']);
Route::get('/basket/add/{product_id}/{resturant_id}' , [BasketController::class ,'addJson'])->middleware(['auth:sanctum']);
Route::get('/basket/min/{product_id}/{resturant_id}' , [BasketController::class ,'minJson'])->middleware(['auth:sanctum']);
Route::get('/checkout/{user_id}' , [BasketController::class , 'checkoutjson'])->name('basket.checkout');
//************************************************************************************************* */


