<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    // Show images for a specific gallery
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    // Store a new image in the gallery
    public function storeImage(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'gallery_id' => $gallery->id,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.galleries.show', $gallery)->with('success', 'Image added successfully!');
    }

    // Delete an image from the gallery
    public function destroyImage(Image $image)
    {
        Storage::disk('public')->delete($image->image_path); // Remove from storage
        $image->delete(); // Remove from database

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
