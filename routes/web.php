<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::view("/about", "about")->name("about");

Route::view("/", "welcome")->name("welcome");

Route::view("/product/add", "productAdd")->name("product.add");
Route::post("/product/added", [\App\Http\Controllers\ProductsController::class, "add"])->name("product.added");
Route::get("/product/cases/all/{categoryId}",[\App\Http\Controllers\ProductsController::class, "products"])->name("product.cases");
Route::get("/product/search/cases", [\App\Http\Controllers\ProductsController::class, "search"])->name("product.search");
Route::get("/product/chargers/all/{categoryId}", [\App\Http\Controllers\ProductsController::class, "products"])->name("product.chargers");
Route::get("/product/headsets/all/{categoryId}", [\App\Http\Controllers\ProductsController::class, "products"])->name("product.headsets");
Route::get("/product/view/{product}", [\App\Http\Controllers\ProductsController::class, "view"])->name("product.view");

Route::post("/review/rating", [\App\Http\Controllers\ReviewsController::class, "rate"])->name("review.stars");

Route::post("/cart/added", [\App\Http\Controllers\CartController::class, "addProduct"])->name("cart.add");
Route::get("/cart/overview", [\App\Http\Controllers\CartController::class, "display"])->name("cart.display");



require __DIR__.'/auth.php';
