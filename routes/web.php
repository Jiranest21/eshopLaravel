<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\UserIsLoggedIn;
use App\Http\Middleware\UserIsAdmin;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [ProductController::class, "index"])->name("home");

Route::get('/product/{id}', function ($id) {
    return view("Product/product", [
        "products" => Product::getById($id),
    ]);

})->name("product.show");

Route::get('/register', function () {
    return view("security/register");
})->name("user.register");



Route::get('/login', function () {
    return view("security/login");
})->name("user.login");
Route::post('/register', [AuthController::class, "register"]);
Route::post('/login',[AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"])->name("logout");
Route::get("/cart",[CartController::class, "index"])->name("cart")->middleware(UserIsLoggedIn::class);;
Route::post("/addToCart",[CartController::class, "store"])->name("AddToCart")->middleware(UserIsLoggedIn::class);
Route::post("/deleteCart",[CartController::class, "destroy"])->name("DeleteCart")->middleware(UserIsLoggedIn::class);
Route::post("/removeCart",[CartController::class, "delete"])->name("cartRemove")->middleware(UserIsLoggedIn::class);

Route::get("/admin",[AdminController::class, "index"])->name("Admin")->middleware(UserIsAdmin::class);
Route::get("/admin/login", [Product::class, "getFiltrs"]);
Route::get("admin/editProductForm/{id}", function($id){
    return view("admin/editProductForm",[
        "product" => Product::getById($id),
    ]);
})->name("EditProductForm")->middleware(UserIsAdmin::class);
Route::post("admin/edit",[ProductController::class, "update"])->name("EditProduct")->middleware(UserIsAdmin::class);
Route::post("admin/delete",[ProductController::class, "delete"])->name("DeleteProduct")->middleware(UserIsAdmin::class);

Route::get("/filteredProducts",[ProductController::class, "filter"])->name("FilteredProducts");
