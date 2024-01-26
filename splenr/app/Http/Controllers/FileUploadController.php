<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    // Method to handle the file upload
    public function store(Request $request)
    {
        // Check if the request contains a file with the name 'file'
        if ($request->hasFile('file')) {
            // Store the uploaded file in the 'public/resume' disk
            $file = $request->file('file')->store('resume', 'public');

            // Update the 'resume' column in the User model for the authenticated user
            User::where('id', auth()->user()->id)->update([
                'resume' => $file
            ]);

            // Return a JSON response indicating success
            return response()->json(['success' => true]);
        }

        // Return a JSON response indicating an error if no file is present in the request
        return response()->json(['error' => 'error']);
    }
}
