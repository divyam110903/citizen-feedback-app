<?php
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    $feedbacks = Feedback::where('user_id', Auth::id())->latest()->get();
    return view('dashboard', compact('feedbacks'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/feedback', [AdminController::class, 'index'])->name('admin.feedback.index');
    Route::get('/feedback/{feedback}', [AdminController::class, 'show'])->name('admin.feedback.show');
    Route::post('/admin/feedback/{id}/update', [AdminController::class, 'update'])->name('admin.feedback.update');
});


Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Feedback
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
});



require __DIR__.'/auth.php';
