<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with('images')->get();
        return view('portfolio', compact('categories'));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return view('piece', compact('category'));
    }
}
