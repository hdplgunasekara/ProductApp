<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAddController;
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

Route::get('/', [HomeController::class, "index"])->name('home');




Route::prefix('/product')->group(function(){
    Route::get('/', [ProductController::class, "dashboard"])->name('product');
    Route::get('/add', [ProductController::class, "addproduct"])->name('productadd');
    Route::post('/store', [ProductController::class, "store"])->name('product.store');
    Route::get('/edit', [ProductController::class, "edit"])->name('product.edit');
    Route::post('/{product_id}/update', [ProductController::class, "update"])->name('product.update');
    Route::get('/{product_id}/delete', [ProductController::class, "delete"])->name('product.delete');
    Route::get('/{product_id}/setactive', [ProductController::class, "setactive"])->name('product.setactive');
    Route::get('/{product_id}/setinactive', [ProductController::class, "setinactive"])->name('product.setinactive');
});




// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
