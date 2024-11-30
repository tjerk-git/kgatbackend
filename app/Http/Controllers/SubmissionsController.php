<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Theme;

class SubmissionsController extends Controller
{
    public function create()
    {
        return view('submissions.create');
    }

    public function store(Request $request)
    {
        $theme = Theme::where('is_active', true)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'nullable|string',
            'attachment' => 'required|image|max:5120|mimetypes:image/jpeg,image/png', // 5MB max
        ]);

        $submission = new Submission();
        $submission->name = $validated['name'];
        $submission->email = $validated['email'];
        $submission->description = $validated['description'];
        $submission->theme_id = $theme->id;
        
        // Store the images
        $submission->attachment = $request->file('attachment')->store('submissions', 'public');

        $submission->save();

        return redirect()->route('submissions.success')
            ->with('success', 'Bedankt voor je inzending! We nemen contact met je op als je werk wordt geselecteerd.');
    }

    public function success()
    {
        return view('submissions.success');
    }
    
    public function failure()
    {
        return view('submissions.failure');
    }
}