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

        $submission = new Submission;
        $submission->name = $request->name;
        $submission->email = $request->email;
        $submission->image = $request->image;
        $submission->description = $request->description;
        //$submission->location = $request->location;

        // if($submission->newsletter == 'on'){
        //     $submission->newsletter = true;
        // }else{
        //     $submission->newsletter = false;
        // }

        //$submission->confirmation_token = bin2hex(random_bytes(32)); // Generate a random confirmation token
        

        // save the image to subdirectory images
        $imageName = time().'.jpg';
        $request->image->move(public_path('images'), $imageName);
        $submission->image = 'images/'.$imageName;

        if($submission->save()){
            $message = "Submission saved successfully!";
        } else {
            $message = "Submission could not be saved!";
        }

        return redirect()->back()->with('message', $message)->withFragment('submission_form');
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

    public function show(Request $request, $id){
        $submission = Submission::find($id);
        return view('submissions.show', compact('submission'));
    }

    public function index()
    {
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
            return view('submissions.success'); 
        } else {
            return view('submissions.failure'); 
        }
    }


    public function allowSubmission($id)
    {
        // get the submission with the given id
        $submission = Submission::find($id);
        $submission->is_approved = true;
        $submission->is_confirmed = true;
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
