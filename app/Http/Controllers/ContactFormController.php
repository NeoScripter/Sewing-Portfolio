<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function send(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'clientname' => 'required|string|max:255',
            'clientemail' => 'required|email',
            'clientmessage' => 'required|string|min:10',
        ]);

        // Send the email
        Mail::to('sange@example.com')->send(new ContactFormMail($validated));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ваше сообщение было отправлено успешно!');
    }
}
