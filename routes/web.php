<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
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

Route::get('/', [MainController::class, 'welcome'])->name('home');
Route::get('/addproduct', [MainController::class, 'addproduct']);
Route::post('/addproduct', [MainController::class, 'addproducttable']);
Route::get('/detailed/{id}', [MainController::class, 'detailed'])->name('detailed');
Route::get('/addreviews/{id}', [MainController::class, 'addreviews']);
Route::post('/addcomment/{id}', [MainController::class, 'addcomment']);
Route::get('/edit/{id}', [MainController::class, 'edit']);
Route::post('/edit_product/{id}', [MainController::class, 'edit_product']);
Route::get('/carousel/{id}', [MainController::class, 'carousel']);
Route::post('/addcarousel/{id}', [MainController::class, 'addcarousel']);
Route::get('/delete_product/{id}', [MainController::class, 'delete_product']);
Route::get('/personal', [AuthController::class, 'personal'])->name('personal');
Route::post('/addname/{id}', [AuthController::class, 'addname']);
Route::post('/addemail/{id}', [AuthController::class, 'addemail']);
Route::post('/addtel/{id}', [AuthController::class, 'addtel']);
Route::post('/adddate/{id}', [AuthController::class, 'adddate']);
Route::post('/addgender/{id}', [AuthController::class, 'addgender']);
Route::post('/addavatar/{id}', [AuthController::class, 'addavatar']);


Route::middleware('auth')->group(function () {
    Route::get('/home', [AuthController::class, 'cabinet'])->name('cabinet');
    Route::get('/exit', [AuthController::class, 'exit']);
});
Route::middleware('guest')->group(function () {
    Route::get('/sign_in', [AuthController::class, 'sign_in'])->name('sign_in');
    Route::get('/registr', [AuthController::class, 'registr']);
    Route::post('/reg', [AuthController::class, 'reg']);
    Route::post('/login', [AuthController::class, 'login']);
});


Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/{id}/{colvo}', [BasketController::class, 'basket_welcome']);