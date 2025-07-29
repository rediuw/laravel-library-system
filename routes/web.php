<?php

// use App\Http\Controllers\BookController;
// use App\Http\Controllers\BorrowingController;
// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// // Public: anyone can view books
// Route::resource('books', BookController::class)->only(['index', 'show']);

// // Admin: manage books
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('books', BookController::class)->except(['index', 'show']);
// });


// // Authenticated users: borrow books
// Route::middleware(['auth'])->group(function () {
//     Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store']);
// });

// Route::get('/test-admin', function () {
//     return 'Admin access confirmed!';
// })->middleware(['auth', 'admin']);




// Route::get('/guest', function () {
//     return view('/guest');
// });

// require __DIR__ . '/auth.php';





use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 🌐 Public route
Route::get('/', function () {
    return view('welcome');
});

// 👤 Authenticated users: profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public routes
Route::get('books', [BookController::class, 'index'])->name('books.index');


// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');




Route::middleware(['auth'])->group(function () {
    Route::get('borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('borrowings/create', [BorrowingController::class, 'create'])->name('borrowings.create');
    Route::post('borrowings', [BorrowingController::class, 'store'])->name('borrowings.store');
});

Route::middleware(['auth', 'admin'])->get('/test-admin', function () {
    return 'You are an admin!';
});




Route::fallback(function () {
    return 'Fallback hit — route not found!';
});

// 🔐 Auth scaffolding
require __DIR__ . '/auth.php';
