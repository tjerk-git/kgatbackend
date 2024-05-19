<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubmissionConfirm;


class SubmissionController extends Controller
{
    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $submission = Submission::create($validatedData); // Create a new Submission
        $submission->confirmation_token = bin2hex(random_bytes(32)); // Generate a random confirmation token
        
        // save the image to subdirectory images
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $submission->image = 'images/'.$imageName;

        if ($submission->save()) {

            // Send an email with the confirmation token (optional)
            Mail::to($submission->email)->send(new SubmissionConfirm($submission));

            return response()->json(['message' => 'Submission created successfully!'], 200);
        } else {
            return response()->json(['message' => 'Failed to create submission. Please try again later.', 'errors' => $submission->errors()], 503);
        }

        // Implement additional logic for confirmation token, approval, etc. (optional)

        //return redirect('/submissions')->with('success', 'Submission created successfully!'); // Redirect with a success message
    }

    public function update(Request $request, $id)
    {   
        $submission = Submission::findOrFail($id);
        $submission->theme = $request->theme;
        $submission->save();

        $html = "Aangepast naar: " . htmlspecialchars($submission->theme);
        return response($html)
        ->withHeaders([
            'Content-Type' => 'text/html',
        ]);
    }

    public function index()
    {
        // Add code to retrieve and display all submissions
        // get only the submissions where is_confirmed is true
        $submissions = Submission::orderBy('created_at', 'desc')->get();
        return view('submissions.index', compact('submissions'));
    }

    public function confirm($confirmation_token, $email)
    {
        // get the submission with the given confirmation token and email
        $submission = Submission::where('confirmation_token', $confirmation_token)->where('email', $email)->first();

        if ($submission) {
            // Update the submission status to confirmed
            $submission->is_confirmed = true;
            $submission->confirmation_token = null;
            $submission->save();
            return view('success'); 
        } else {
            return view('failure'); 
        }
    }

    public function allowSubmission($id)
    {
        // get the submission with the given id
        $submission = Submission::find($id);
        $submission->is_approved = true;
        $submission->save();

        $html = '✅';
        return response($html)
        ->withHeaders([
            'Content-Type' => 'text/html',
        ]);
    }
    public function destroy($id)
    {
        $submission = Submission::find($id);
        if ($submission) {
            $submission->delete();
            //return response()->json(['message' => 'Submission deleted successfully!'], 200);
        } else {
            //return response()->json(['message' => 'Submission not found.'], 404);
        }
    }
}
