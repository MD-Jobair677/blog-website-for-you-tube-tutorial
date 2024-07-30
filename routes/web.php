<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-category',[BackendController::class,'addcategory'])->name('add-category');

Route::post('store-category',[BackendController::class,'storeCategory'])->name('store-category');
Route::get('all-category-show',[BackendController::class,'categoryshow'])->name('all-category-show');

Route::get('/categoroy-edit/{id}',[BackendController::class,'aditecategory'])->name('categoroy-edit');

// update category
Route::post('update-category',[BackendController::class,'updateCategory'])->name('update-category');

Route::delete('category-delete/{id}',[BackendController::class,'CategoryDelete'])->name('category-delete');

// SUBCATEGORY ROUTE
Route::get('/add-sub-category',[SubcategoryController::class,'addSubCategory'])->name('add-sub-category');

// STORE SUBCATEGORY

Route::post('store-subcategory',[SubcategoryController::class,'StoreSubcategory'])->name('store-subcategory');
// ALL SUBCATEGORY
Route::get('/all-sub-category',[SubcategoryController::class,'AllSubCategory'])->name('all-sub-category');

Route::get('edite-category/{id}',[SubcategoryController::class,'EditeCategory'])->name('edite-category');


Route::put('update-subcategory/{id}',[SubcategoryController::class,'UpdateSubcategory'])->name('update-subcategory');

Route::delete('delete/{id}',[SubcategoryController::class,'delete'])->name("delete");

Route::get("/add-post",[PostController::class,'AddPost'])->name('add-post');
Route::post('store-post',[PostController::class,'StorePost'])->name('store-post');

// SUBCATEGORY AJAX
Route::get('getsubcategory',[PostController::class,'GetSubcategory'])->name('getsubcategory');