<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contactsText = Content::where('page_name', 'contacts')->where('section_name', 'contact_text')->first();

        return view('contact', compact('contactsText'));
    }
}
