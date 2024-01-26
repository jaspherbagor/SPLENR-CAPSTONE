<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Constants for user types
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    // Show the registration form for job seekers
    public function createSeeker()
    {
        return view('user.seeker-register');
    }

    // Show the registration form for employers
    public function createEmployer()
    {
        return view('user.employer-register');
    }

    // Store a new job seeker user
    public function storeSeeker(RegistrationFormRequest $request)
    {
        // Create a new user with job seeker attributes
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);

        // Log in the new user
        Auth::login($user);

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        // Return success JSON response
        return response()->json('success');
    }

    // Store a new employer user
    public function storeEmployer(RegistrationFormRequest $request)
    {
        // Create a new user with employer attributes and a trial period
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]);

        // Log in the new user
        Auth::login($user);

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        // Return success JSON response
        return response()->json('success');
    }

    // Show the login form
    public function login()
    {
        return view('user.login');
    }

    // Process the login form submission
    public function postLogin(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Attempt to authenticate user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Redirect to the appropriate dashboard based on user type
            if (auth()->user()->user_type === 'employer') {
                return redirect()->to('dashboard');
            } else {
                return redirect()->to('/');
            }
        }

        // Redirect back with error message for invalid credentials
        return back()->with('error', 'Wrong email or password!');
    }

    // Log out the user
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    // Show the user's profile
    public function profile()
    {
        return view('profile.index');
    }

    // Show the seeker's profile if the user is a seeker
    public function seekerProfile()
    {
        if (auth()->user()->user_type === 'seeker') {
            return view('seeker.profile');
        } else {
            return back();
        }
    }

    // Change the user's password
    public function changePassword(Request $request)
    {
        // Validate password change request
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect!');
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect back with success message
        return back()->with('success', 'Your password has been updated successfully!');
    }

    // Upload a resume for the user
    public function uploadResume(Request $request)
    {
        // Validate resume file
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx',
        ]);

        // If a resume file is provided, store it and update the user's record
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resume', 'public');
            User::find(auth()->user()->id)->update(['resume' => $resumePath]);

            // Redirect back with success message
            return back()->with('success', 'Your resume has been updated successfully');
        }
    }

    // Update user profile information
    public function update(Request $request)
    {
        // Validate profile update request
        $this->validate($request, [
            'profile_pic' => 'mimes:png,jpg,jpeg,webp,svg|max:5120',
        ]);

        // If a profile picture is provided, store it and update the user's record
        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('profile', 'public');
            User::find(auth()->user()->id)->update(['profile_pic' => $imagePath]);
        }

        // Update the user's other profile information
        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        // Redirect back with success message
        return back()->with('success', 'Your profile has been updated!');
    }

    // Show jobs applied by the user (for seekers)
    public function jobApplied()
    {
        // Retrieve user information with associated listings
        $users = User::with('listings')->where('id', auth()->user()->id)->get();

        // Display jobs applied view for seekers
        if (auth()->user()->user_type === 'seeker') {
            return view('seeker.job-applied', compact('users'));
        } else {
            return back();
        }
    }
}
