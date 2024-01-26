<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
    // Method to display job listings based on filters
    public function index(Request $request)
    {
        // Filtering and retrieving jobs
        $jobs = $this->filterListings($request)
            ->with('profile')
            ->get();

        // Returning the 'jobs' view with filtered jobs
        return view('jobs', compact('jobs'));
    }

    // Method to display a single job listing
    public function show(Listing $listing)
    {
        // Formatting the application close date for the listing
        $listing = $this->formatListingDate($listing);

        // Returning the 'show' view with the formatted listing
        return view('show', compact('listing'));
    }

    // Method to display jobs associated with a company
    public function company($id)
    {
        // Retrieving the company with associated jobs
        $company = User::with('jobs')
            ->where('id', $id)
            ->where('user_type', 'employer')
            ->first();

        // Returning the 'company' view with the company data
        return view('company', compact('company'));
    }

    // Method to display jobs on the homepage with filtering
    public function homepage(Request $request)
    {
        // Filtering and retrieving jobs for the homepage
        $jobs = $this->filterListings($request)
            ->with('profile')
            ->get();

        // Returning the 'home' view with filtered jobs for homepage display
        return view('home', compact('jobs'));
    }

    // Private method to filter job listings based on request parameters
    private function filterListings(Request $request)
    {
        $salary = $request->query('sort');
        $date = $request->query('date');
        $jobType = $request->query('job_type');

        // Querying the listings based on filters
        $listings = Listing::query();

        // Sorting by salary if specified in the query parameters
        if ($salary === 'salary_high_to_low') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) DESC');
        } elseif ($salary === 'salary_low_to_high') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) ASC');
        }

        // Sorting by date if specified in the query parameters
        if ($date === 'latest') {
            $listings->orderBy('created_at', 'desc');
        } elseif ($date === 'oldest') {
            $listings->orderBy('created_at', 'asc');
        }

        // Filtering by job type if specified in the query parameters
        if ($jobType) {
            $listings->where('job_type', $jobType);
        }

        return $listings;
    }

    // Private method to format the application close date for a listing
    private function formatListingDate(Listing $listing)
    {
        $formattedDate = Carbon::parse($listing->application_close_date)->format('F j, Y');
        $listing->formattedDate = $formattedDate;

        return $listing;
    }
}
