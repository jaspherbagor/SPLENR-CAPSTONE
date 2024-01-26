<?php

namespace App\Http\Controllers;

use App\Mail\HireMail;
use App\Mail\RejectMail;
use App\Mail\ShortlistMail;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    // Method to display a list of listings for the authenticated user
    public function index()
    {
        // Retrieve the latest listings associated with the authenticated user
        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();

        // Return the 'applicants.index' view with the retrieved listings
        return view('applicants.index', compact('listings'));
    }

    // Method to show details of a specific listing and its applicants
    public function show(Listing $listing)
    {
        // Authorize the user to view the specified listing
        $this->authorize('view', $listing);

        // Retrieve the listing with its associated users and order by the most recently updated
        $listing = Listing::with('users')->where('slug', $listing->slug)->orderBy('updated_at', 'desc')->first();

        // Return the 'applicants.show' view with the retrieved listing
        return view('applicants.show', compact('listing'));
    }

    // Method to shortlist an applicant for a specific listing
    public function shortlist($listingId, $userId)
    {
        // Find the listing and user by their respective IDs
        $listing = Listing::find($listingId);
        $user = User::find($userId);

        // Check if the listing exists
        if ($listing) {
            // Update the application status of the user for the listing to 'shortlisted'
            $listing->users()->updateExistingPivot($userId, ['application_status' => 'shortlisted']);

            // Send a shortlist email to the applicant
            Mail::to($user->email)->send(new ShortlistMail($user->name, $listing->title));

            // Redirect back with a success message
            return back()->with('success', 'Applicant is shortlisted successfully!');
        }

        // If the listing doesn't exist, redirect back
        return back();
    }

    // Method to reject an applicant for a specific listing
    public function reject($listingId, $userId)
    {
        // Find the listing and user by their respective IDs
        $listing = Listing::find($listingId);
        $user = User::find($userId);

        // Check if the listing exists
        if ($listing) {
            // Update the application status of the user for the listing to 'declined'
            $listing->users()->updateExistingPivot($userId, ['application_status' => 'declined']);

            // Send a rejection email to the applicant
            Mail::to($user->email)->send(new RejectMail($user->name, $listing->title));

            // Redirect back with a success message
            return back()->with('success', 'Applicant is rejected successfully!');
        }

        // If the listing doesn't exist, redirect back
        return back();
    }

    // Method to hire an applicant for a specific listing
    public function hire($listingId, $userId)
    {
        // Find the listing and user by their respective IDs
        $listing = Listing::find($listingId);
        $user = User::find($userId);

        // Check if the listing exists
        if ($listing) {
            // Update the application status of the user for the listing to 'hired'
            $listing->users()->updateExistingPivot($userId, ['application_status' => 'hired']);

            // Send a hiring email to the applicant
            Mail::to($user->email)->send(new HireMail($user->name, $listing->title));

            // Redirect back with a success message
            return back()->with('success', 'Applicant is hired successfully!');
        }

        // If the listing doesn't exist, redirect back
        return back();
    }

    // Method to allow a user to apply for a specific listing
    public function apply($listingId)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Check if the user is a job seeker
        if ($user->user_type === 'seeker') {
            // Attach the listing to the user as an application
            $user->listings()->syncWithoutDetaching($listingId);

            // Redirect back with a success message
            return back()->with('success', 'Your application has been successfully submitted!');
        } else {
            // If the user is not a job seeker, display an error message
            return back()->with('error', 'Only job seekers are allowed to apply for the job.');
        }
    }
}
