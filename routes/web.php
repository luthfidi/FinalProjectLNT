<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BookController::class, 'index']);

Route::middleware('isAdmin')->group(function(){
    Route::get('/createCategory', function () {
        return view('createCategory');
    });
    Route::post('/storeCategory', [CategoryController::class, 'store']);
    Route::get('/createBook', [BookController::class, 'create']);
    Route::post('/storeBook', [BookController::class, 'store']);
    Route::get('/editBook/{id}', [BookController::class, 'show']);
    Route::patch('/patchBook/{id}', [BookController::class, 'edit']);
    Route::delete('/deleteBook/{id}', [BookController::class, 'destroy']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [BookController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/createFaktur', [BookController::class, 'showFaktur']);
Route::get('/selectFaktur/{id}', [BookController::class, 'add_to_cart']);
Route::get('/cart', [BookController::class, 'show_cart']);
Route::get('/addQty/{rowId}', [BookController::class, 'add_qty']);
Route::get('/minQty/{rowId}', [BookController::class, 'min_qty']);
Route::post('/storeFaktur', [BookController::class, 'storeFaktur']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
