<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdventureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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


Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');

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
Route::get('/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::get('/profile/{id}', [UserController::class, 'showProfile'])   ->middleware('auth') ->name('profile.show');





Route::put('/profile/{id}/update-image', [UserController::class, 'updateProfileImage'])->name('users.updateProfileImage');
Route::middleware(['auth', 'superadmin'])->group(function () {
  
    Route::get('/superadmin', [SuperAdminController::class, 'manageRoles'])->name('superadmin');
    Route::post('/superadmin/update-role/{id}', [SuperAdminController::class, 'updateRole'])->name('superadmin.update_role');
});





// Route::post('/book-adventure/{adventureId}', [BookingController::class, 'bookAdventure'])->name('book.adventure');
// Route::get('/search-adventures', [AdventureController::class, 'search'])->name('search.adventures');


// Route::get('/profile/{id}', [ProfileController::class, 'profilePage'])->name('profile');


Route::get('/adventures', [AdventureController::class, 'index'])->name('adventures.index');
Route::post('/adventures/search', [AdventureController::class, 'search'])->name('adventures.search');

// Bookings
Route::post('/book-adventure/{id}', [BookingController::class, 'bookAdventure'])
    ->name('book.adventure')
    ->middleware('auth');

// Profile
Route::get('/profile/{id}', [ProfileController::class, 'profilePage'])->name('profile.page');
Route::put('/profile/update-image/{userId}', [ProfileController::class, 'updateImage'])
    ->name('profile.updateImage')
    ->middleware('auth');


Route::get('/adventures/search', [AdventureController::class, 'search'])->name('search.adventures');




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/bookings/filter', [DashboardController::class, 'filter'])->name('bookings.filter');

Route::get('/bookings/{id}/edit', [DashboardController::class, 'edit'])->name('bookings.edit');

// تحديث الحجز
Route::put('/bookings/{id}', [DashboardController::class, 'update'])->name('bookings.update');

// حذف الحجز
Route::delete('/bookings/{id}', [DashboardController::class, 'destroy'])->name('bookings.destroy');