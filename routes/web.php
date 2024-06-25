<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Middleware\BasicAuthMiddleware;

Route::get('/', function () {
    // get all allowed submissions
    $submissions = \App\Models\Submission::where('is_approved', 1)
        ->where('theme', 'textuur')
        ->get();

    return view('index', compact('submissions'));
});

Route::get('/submissions/confirm/{confirmation_token}/{email}', [SubmissionController::class, 'confirm'])->name('submissions.confirm');
Route::post('/submissions', [SubmissionController::class, 'store'])->name('submissions.store');

Route::get('/submissions/show/{id}', [SubmissionController::class, 'show'])->name('submissions.show');

Route::middleware(BasicAuthMiddleware::class)->group(function () {
   
    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submissions.index');
   
    Route::get('/submissions/allow/{id}', [SubmissionController::class, 'allow'])->name('submissions.allow');
    Route::post('/submissions/allow/{id}', [SubmissionController::class, 'allowSubmission'])->name('submissions.allowSubmission');
    Route::post('/submissions/updateTheme/{id}', [SubmissionController::class, 'update'])->name('submissions.update');
    Route::delete('/submissions/{id}', [SubmissionController::class, 'destroy'])->name('submissions.destroy');
});

