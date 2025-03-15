<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdventureController;
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


Route::get('/web', function () {
    return view('website');
});


Route::get('/dash', function () {
    return view('dashboard');
});



// Route::get('/', function () {
//     return view('website');
// });


// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/adventures', function () {
//     return view('adventures');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// About Us Page


// Adventures Page


// Gallery Page
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

// Blog Page
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// FAQ Page
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Contact Us Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/search-adventures', [AdventureController::class, 'search'])->name('search.adventures');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');