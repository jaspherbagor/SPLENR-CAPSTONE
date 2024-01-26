<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\isEmployer;
use App\Http\Middleware\isPremiumUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Homepage Route
Route::get('/', [JoblistingController::class, 'homepage'])->name('homepage');

// FAQs Route
Route::get('/FAQs', function() {
    return view('FAQs');
});

// About Route
Route::get('/about', function() {
    return view('about');
});

// Privacy Policy Route
Route::get('/privacy-policy', function() {
    return view('privacy-policy');
});

// Terms and Conditions Page
Route::get('/terms-and-condition', function() {
    return view('terms-and-condition');
});

// Route to display the contact form
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

// Route to handle form submissions
Route::post('/submit/contact', [ContactController::class, 'submitContact'])->name('submit.contact');

// Job routes
Route::get('/jobs', [JoblistingController::class, 'index'])->name('listing.index');
Route::get('/company/{id}', [JoblistingController::class, 'company'])->name('company');
Route::get('/jobs/{listing:slug}', [JoblistingController::class, 'show'])->name('job.show');

// File upload route
Route::post('/resume/upload', [FileUploadController::class, 'store'])->middleware('auth');

// Email verification route
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

// User registration routes
Route::get('/register/seeker', [UserController::class, 'createSeeker'])
    ->name('create.seeker')
    ->middleware(CheckAuth::class);

Route::post('/register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
Route::get('/register/employer', [UserController::class, 'createEmployer'])
    ->name('create.employer')
    ->middleware(CheckAuth::class);
    
Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware(CheckAuth::class);
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('user/profile', [UserController::class, 'update'])->name('user.update.profile');
    Route::get('user/profile/seeker', [UserController::class, 'seekerProfile'])
        ->name('seeker.profile')
        ->middleware('verified');
    Route::get('user/job/applied', [UserController::class, 'jobApplied'])->name('job.applied')->middleware('verified');
    Route::post('user/changepassword', [UserController::class, 'changePassword'])->name('user.changepassword');
    Route::post('upload/resume', [UserController::class, 'uploadResume'])->name('upload.resume');
});

// Dashboard and verification routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified', isPremiumUser::class])
    ->name('dashboard');

Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('/resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');

// Subscription and payment routes
Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/pay/weekly', [SubscriptionController::class, 'initiatePayment'])->name('pay.weekly');
Route::get('/pay/monthly', [SubscriptionController::class, 'initiatePayment'])->name('pay.monthly');
Route::get('/pay/yearly', [SubscriptionController::class, 'initiatePayment'])->name('pay.yearly');
Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
Route::get('payment/cancel', [SubscriptionController::class, 'cancel'])->name('payment.cancel');

// Job posting routes
Route::get('job/create', [PostJobController::class, 'create'])->name('job.create')->middleware(isPremiumUser::class);
Route::post('job/store', [PostJobController::class, 'store'])->name('job.store');
Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
Route::put('job/{id}/edit', [PostJobController::class, 'update'])->name('job.update');
Route::get('job', [PostJobController::class, 'index'])->name('job.index');
Route::delete('job/{id}/delete', [PostJobController::class, 'destroy'])->name('job.delete');

// Applicant routes
Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('applicants/{listing:slug}', [ApplicantController::class, 'show'])->name('applicants.show');
Route::post('shortlist/{listingId}/{userId}', [ApplicantController::class, 'shortlist'])->name('applicants.shortlist');
Route::post('reject/{listingId}/{userId}', [ApplicantController::class, 'reject'])->name('applicants.reject');
Route::post('hire/{listingId}/{userId}', [ApplicantController::class, 'hire'])->name('applicants.hire');
Route::post('/application/{listingId}/submit', [ApplicantController::class, 'apply'])
    ->name('application.submit')
    ->middleware('verified');
