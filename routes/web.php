<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('listings/create',[ListingController::class, 'create'])->middleware('auth');

// show create form
Route::post('listings',[ListingController::class, 'store'])->middleware('auth');

// show edit form
Route::get('listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show Registration Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Register User
Route::post('/users', [UserController::class, 'store']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);
// Route::get('/hello', function(){
//     return response("<h1>Hello world</h1>", 200)
//     ->header('foo',' bar');

// });

// Route::get('/posts/{id}', function($id) {
//     ddd($id);
//     return response('Post '.$id);

// })-> where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//     return $request->name . ' ' . $request->city;
// });

