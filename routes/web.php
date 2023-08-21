<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', [AuthController::class, 'home'])->name("home");
    Route::get('categories', [AuthController::class, 'categories'])->name("categories");
    Route::get('products', [AuthController::class, 'products'])->name("products");


    Route::get('add-category', [AuthController::class, 'addCategory'])->name("add-category");
    Route::post('add-category', [AuthController::class, 'doAddCategory']);
    Route::get('view-category/{id}', [AuthController::class, 'viewCategory'])->name("view-category");
    Route::get('edit-category/{id}', [AuthController::class, 'editCategory'])->name("edit-category");
    Route::post('edit-category', [AuthController::class, 'doEditCategory']);
    Route::get('delete-category/{id}', [AuthController::class, 'deleteCategory'])->name('delete-category');


    Route::get('add-product', [AuthController::class, 'addProduct'])->name("add-product");
    Route::post('add-product', [AuthController::class, 'doAddProduct']);
    Route::get('view-product/{id}', [AuthController::class, 'viewProduct'])->name("view-product");
    Route::get('edit-product/{id}', [AuthController::class, 'editProduct'])->name("edit-product");
    Route::post('edit-product', [AuthController::class, 'doEditProduct']);
    Route::get('delete-product/{id}', [AuthController::class, 'deleteProduct'])->name('delete-product');


    Route::get('orders', [OrderController::class, 'showAllOrders'])->name("orders");
    Route::get('new-order', [OrderController::class, 'newOrder'])->name("new-order");
    Route::get('view-order/{order_id}', [OrderController::class, 'viewOrder'])->name("view-order");

});
