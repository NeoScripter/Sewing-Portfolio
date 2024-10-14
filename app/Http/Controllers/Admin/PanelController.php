<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function home() {
        return view('admin.home');
    }


    public function contacts() {
        return view('admin.contacts');
    }


}
