<?php

namespace App\Http\Controllers;

use App\Http\Middleware\doNotAllowUserToMakePayment;
use App\Http\Middleware\isEmployer;
use App\Mail\PurchaseMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    // Constants for subscription pricing and currency
    const WEEKLY_PRICE = 500;
    const MONTHLY_PRICE = 1500;
    const YEARLY_PRICE = 10000;
    const CURRENCY = 'php';

    // Constructor to set up middleware for the controller
    public function __construct()
    {
        $this->middleware(['auth', isEmployer::class]);
        $this->middleware(['auth', doNotAllowUserToMakePayment::class])->except('subscribe');
    }

    // Method to display the subscription page
    public function subscribe()
    {
        return view('subscription.index');
    }

    // Method to initiate the payment process
    public function initiatePayment(Request $request)
    {
        // Initialize Stripe client
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        // Define subscription plans
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'Weekly Payment',
                'price' => self::WEEKLY_PRICE,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'Monthly Payment',
                'price' => self::MONTHLY_PRICE,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'Yearly Payment',
                'price' => self::YEARLY_PRICE,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
        ];

        try {
            // Determine selected plan and set billing end date
            $selectPlan = null;
            $billingEnds = null;

            // Check the request URL to determine the plan
            if ($request->is('pay/weekly')) {
                // Set the selected plan and billing end date for weekly payment
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            } elseif ($request->is('pay/monthly')) {
                // Set the selected plan and billing end date for monthly payment
                $selectPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            } elseif ($request->is('pay/yearly')) {
                // Set the selected plan and billing end date for yearly payment
                $selectPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }

            // Check if a valid plan is selected
            if ($selectPlan) {
                // Generate a signed URL for the success route
                $successURl = URL::signedRoute('payment.success', [
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);

                // Create a checkout session using the Stripe API
                $session = $stripe->checkout->sessions->create([
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => $selectPlan['currency'],
                                'product_data' => ['name' => $selectPlan['description']],
                                'unit_amount' => $selectPlan['price'] * 100,
                            ],
                            'quantity' => $selectPlan['quantity'],
                        ],
                    ],
                    'mode' => 'payment',
                    'success_url' => $successURl . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('payment.cancel'),
                ]);

                // Redirect to the Stripe checkout session URL
                if (isset($session->id) && $session->id !== '') {
                    return redirect($session->url);
                } else {
                    return redirect()->route('payment.cancel');
                }
            }
        } catch (\Exception $e) {
            // Handle exceptions and return a JSON response
            return response()->json($e);
        }
    }

    // Method to handle payment success
    public function paymentSuccess(Request $request)
    {
        // Update user information and send a purchase confirmation email
        $plan = $request->plan;
        $billingEnds = $request->billing_ends;
        User::where('id', auth()->user()->id)->update([
            'plan' => $plan,
            'billing_ends' => $billingEnds,
            'status' => 'paid'
        ]);

        try {
            Mail::to(auth()->user())->send(new PurchaseMail($plan, $billingEnds));
        } catch (\Exception $e) {
            return response()->json($e);
        }

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Payment was processed successfully!');
    }

    // Method to handle payment cancellation
    public function cancel()
    {
        // Redirect to the dashboard with an error message
        return redirect()->route('dashboard')->with('error', 'Payment was unsuccessful!');
    }
}
