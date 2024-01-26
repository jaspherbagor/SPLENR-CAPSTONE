<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isPremiumUser;
use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobPostFormRequest;
use App\Models\Listing;
use App\Post\JobPost;

class PostJobController extends Controller
{
    protected $job;

    // Constructor to initialize the controller with dependencies
    public function __construct(JobPost $job)
    {
        $this->job = $job;

        // Middleware to require authentication for all methods
        $this->middleware('auth');

        // Middleware to check if the user is a premium user for specific methods
        $this->middleware(isPremiumUser::class)->only(['create', 'store']);
    }

    // Method to display a list of jobs posted by the authenticated user
    public function index()
    {
        // Retrieve jobs associated with the authenticated user
        $jobs = Listing::where('user_id', auth()->user()->id)->get();

        // Return the 'job.index' view with the retrieved jobs
        return view('job.index', compact('jobs'));
    }

    // Method to display the job creation form
    public function create()
    {
        return view('job.create');
    }

    // Method to store a new job post
    public function store(JobPostFormRequest $request)
    {
        // Call the 'store' method of the JobPost class to handle the job post creation
        $this->job->store($request);

        // Redirect back with a success message
        return back()->with('success', 'Your job has been posted successfully!');
    }

    // Method to display the form for editing a job post
    public function edit(Listing $listing)
    {
        return view('job.edit', compact('listing'));
    }

    // Method to update an existing job post
    public function update($id, JobEditFormRequest $request)
    {
        // Call the 'updatePost' method of the JobPost class to handle the job post update
        $this->job->updatePost($id, $request);

        // Redirect back with a success message
        return back()->with('success', 'Your job post has been successfully updated!');
    }

    // Method to delete a job post
    public function destroy($id)
    {
        // Find and delete the job post with the specified ID
        Listing::find($id)->delete();

        // Redirect back with a success message
        return back()->with('success', 'Your job post has been successfully deleted!');
    }
}
