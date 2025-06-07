<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Rules\Recaptcha;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {

        // Capture the data
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10',
            'recaptcha_token' => ['required', new Recaptcha(0.6)],
        ]);

        Mail::to('contact@vilkrin.uk')->send(new ContactMail($validated));


        return back()->with('success', 'Thank you for your message!');
    }
}
