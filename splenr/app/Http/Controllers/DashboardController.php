<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Constructor to apply 'auth' middleware to all methods in the controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Method to display the user's dashboard with listings
    public function index()
    {
        // Retrieve the latest listings associated with the authenticated user
        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();

        // Return the 'dashboard' view with the retrieved listings
        return view('dashboard', compact('listings'));
    }

    // Method to show the email verification view
    public function verify()
    {
        return view('user.verify');
    }

    // Method to resend the email verification link
    public function resend(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user's email has already been verified
        if ($user->hasVerifiedEmail()) {
            // Redirect to the home route with a success message
            return redirect()->route('home')->with('success', 'Your email was verified!');
        }

        // Send a new email verification notification to the user
        $user->sendEmailVerificationNotification();

        // Redirect back with a success message
        return back()->with('success', 'Verification link sent successfully');
    }
}
