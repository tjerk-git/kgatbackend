<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/submissions', [SubmissionController::class, 'index'])->name('submissions.index');
Route::post('/submissions/new', [SubmissionController::class, 'store'])->name('submissions.store');

// create a route for submissons allow
Route::get('/submissions/allow/{id}', [SubmissionController::class, 'allow'])->name('submissions.allow');
// create a post route for submissons allow
Route::post('/submissions/allow/{id}', [SubmissionController::class, 'allowSubmission'])->name('submissions.allowSubmission');

Route::get('/submissions/{confirmation_token}/{email}', [SubmissionController::class, 'confirm'])->name('submissions.confirm');

// create a update route for submissons
Route::post('/submissions/updateTheme/{id}', [SubmissionController::class, 'update'])->name('submissions.update');

// create a delete route for submissons
Route::delete('/submissions/{id}', [SubmissionController::class, 'destroy'])->name('submissions.destroy');