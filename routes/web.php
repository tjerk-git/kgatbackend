<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionsController;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Models\Masterpiece;
use App\Models\Setting;
use App\Models\Theme;
use App\Models\Submission;


Route::get('/', function () {
    return view('index', [
        'masterpieces' => Masterpiece::all(),
        'submissions' => Submission::whereHas('theme', function ($query) {
            $query->where('is_active', true);
        })->where('is_approved', true)->get(),
        'settings' => Setting::first(),
        'theme' => Theme::where('is_active', true)->get()->first(),
    ]);
});

Route::get('/inzending', [SubmissionsController::class, 'create'])->name('submissions.create');
Route::post('/inzending', [SubmissionsController::class, 'store'])->name('submissions.store');

Route::get('/inzending/success', [SubmissionsController::class, 'success'])->name('submissions.success');
Route::get('/inzending/failure', [SubmissionsController::class, 'failure'])->name('submissions.failure');