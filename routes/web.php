<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdventureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
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


// Route::get('/dash', function () {
//     return view('dashboard');
// });



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


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
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/search-adventures', [AdventureController::class, 'search'])->name('search.adventures');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::resource('users', UserController::class);

Route::resource('contact', ContactController::class);


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
// });

// Route::post('/superadmin/update-role/{id}', [SuperAdminController::class, 'updateRole'])->name('superadmin.update_role');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
Route::put('/profile/{id}/update-image', [UserController::class, 'updateProfileImage'])->name('users.updateProfileImage');
Route::middleware(['auth', 'superadmin'])->group(function () {
  
    Route::get('/superadmin', [SuperAdminController::class, 'manageRoles'])->name('superadmin');
    Route::post('/superadmin/update-role/{id}', [SuperAdminController::class, 'updateRole'])->name('superadmin.update_role');
});