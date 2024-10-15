<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $heroImage = Content::where('page_name', 'home')->where('section_name', 'hero')->first();
        $heroText = Content::where('page_name', 'home')->where('section_name', 'hero_text')->first();
        $homeImage = Content::where('page_name', 'home')->where('section_name', 'home')->first();
        $homeText = Content::where('page_name', 'home')->where('section_name', 'home_text')->first();

        return view('index', compact('heroImage', 'heroText', 'homeImage', 'homeText'));
    }
}
