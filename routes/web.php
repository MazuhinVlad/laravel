<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books')->name('home');
Route::resource('books', BookController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/statistics', function () {
        $total = Book::count();
        $available = Book::where('is_available', true)->count();
        return view('admin.statistics', compact('total', 'available'));
    })->name('statistics');
});

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);

Route::fallback(function () {
    return response()->view('errors.custom-404', [], 404);
});



