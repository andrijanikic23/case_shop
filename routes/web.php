<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
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



Route::controller(ProductsController::class)->prefix("product")->group(function(){
    Route::post("/added","add")->name("product.added");
    Route::get("/cases/all/{categoryId}","products")->name("product.cases");
    Route::get("/search/cases","search")->name("product.search");
    Route::get("/chargers/all/{categoryId}","products")->name("product.chargers");
    Route::get("/headsets/all/{categoryId}","products")->name("product.headsets");
    Route::get("/view/{product}","view")->name("product.view");
});

Route::view("/product/add", "productAdd")->name("product.add");


Route::post("/review/rating", [ReviewsController::class, "rate"])->name("review.stars");

Route::controller(CartController::class)->prefix("cart")->group(function(){
    Route::post("/added", "addProduct")->name("cart.add");
    Route::get("/overview", "display")->name("cart.display");
    Route::post("/overview/minus-product", "minusCartItem")->name("cart.minus");
});


Route::post("/order/finished", [OrdersController::class, "finished"])->name("order.finished");

Route::view("/contact", "contact")->name("contact.info");



require __DIR__.'/auth.php';
