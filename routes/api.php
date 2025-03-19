<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


ROute::post('insert-product', [ProductController::class, 'insertProduct']);
ROute::post('insert-member', [MemberController::class, 'insertMember']);
ROute::post('signup', [MemberController::class, 'signup']);

Route::put('update-product', [ProductController::class, 'updateProduct']);
Route::get('search-product/{name}', [ProductController::class, 'searchProduct']);
Route::get('search-product-id/{id}', [ProductController::class, 'searchProductId']);
Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct']);