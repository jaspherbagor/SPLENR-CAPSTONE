<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Import the Contact model

class ContactController extends Controller
{
    // Method to display the contact form
    public function contact()
    {
        return view('contact');
    }


    // Define a constant array for common validation rules
    private const STRING_VALIDATION = 'required|string';

    // Method to handle form submissions
    public function submitContact(Request $request)
    {
        // Define an array with field-specific validation rules
        $fieldValidationRules = [
            'first_name' => self::STRING_VALIDATION,
            'last_name' => self::STRING_VALIDATION,
            'contact_number' => self::STRING_VALIDATION,
            'zip_code' => self::STRING_VALIDATION,
            'email' => 'required|email',
            'address' => self::STRING_VALIDATION,
            'message' => self::STRING_VALIDATION,
        ];

        // Validate form data using the combined array of rules
        $validatedData = $request->validate($fieldValidationRules);

        // Create a new Contact model instance and fill it with validated data
        $contact = new Contact();
        $contact->fill($validatedData);
        $contact->save(); // Save the data to the database

        // Redirect to a thank you page or return a success response
        return back()->with('success', 'Your message has been sent!');
    }
}
