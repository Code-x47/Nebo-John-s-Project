<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
use App\Http\Controllers\EcommerceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Post("login",[apiController::class,"login"]);


//PROTECTED ROUTES
Route::Group(["middleware"=>["auth:sanctum"]],function() {
    Route::controller(apiController::class)->Group(function() {
        Route::Post("create","create_product");
        Route::Get("view-product","view_product");
        Route::Post("update/{product}","update");
        Route::Delete("Delete/{product}","Delete");
   
    });

});


//ECOMMERCE CONTROLLER ROUTES
Route::Group(["middleware"=>["auth:sanctum"]],function() {
Route::controller(EcommerceController::class)->group(function() {
  Route::Post("create_order","create_order");
  Route::Get("view_order","view_order");
  Route::Get("view_order_items","view_order_items");
  Route::Get("topCustomers","topCustomers");
  Route::Get("totalRevenue","totalRevenue");
  Route::Post("create_order_items/{id}","create_order_items");
  Route::Get("mostSoldProducts","mostSoldProducts");
});
    
});   
    


