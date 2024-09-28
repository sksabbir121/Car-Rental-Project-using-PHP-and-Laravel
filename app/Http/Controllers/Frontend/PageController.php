<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    // Show the Contact Page
    public function contact()
    {
        return view('frontend.contact');
    }

    // Handle Contact Form Submission
    public function sendContact(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send email or save to database (here's an example for email)
        Mail::send([], [], function($message) use ($request) {
            $message->to('admin@example.com')
                    ->subject('New Contact Message')
                    ->from($request->email, $request->name)
                    ->setBody($request->message, 'text/html');
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
