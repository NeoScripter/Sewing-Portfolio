<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PanelController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function home()
    {
        $heroImage = Content::where('page_name', 'home')->where('section_name', 'hero')->first();
        $heroText = Content::where('page_name', 'home')->where('section_name', 'hero_text')->first();
        $homeImage = Content::where('page_name', 'home')->where('section_name', 'home')->first();
        $homeText = Content::where('page_name', 'home')->where('section_name', 'home_text')->first();

        return view('admin.home', compact('heroImage', 'heroText', 'homeImage', 'homeText'));
    }


    public function contacts()
    {
        $contactsText = Content::where('page_name', 'contacts')->where('section_name', 'contact_text')->first();

        return view('admin.contacts', compact('contactsText'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validate the inputs (adjust for text or image as needed)
        $validated = $request->validate([
            'content_id' => 'nullable|exists:contents,id', // Content ID (nullable for new content)
            'section_name' => 'required|string|max:255',  // Section name (e.g., "hero", "about")
            'page_name' => 'required|string|max:255',
            'section_content' => 'nullable|string|max:1000', // For text content
            'image' => 'nullable|image|max:1024', // Optional for image uploads
        ]);

        // Check if content ID exists (if content needs to be updated)
        if ($request->filled('content_id')) {
            $content = Content::find($request->content_id); // Find existing content by ID
        } else {
            $content = new Content; // Create new content
        }

        // Set common fields
        $content->page_name = $validated['page_name'];
        $content->section_name = $validated['section_name'];
        $content->type = $request->hasFile('image') ? 'image' : 'text'; // Determine the content type

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if updating
            if ($content->exists && $content->type == 'image' && $content->content) {
                Storage::disk('public')->delete($content->content);
            }

            // Store new image and save its path
            $imagePath = $request->file('image')->store('images', 'public');
            $content->content = $imagePath; // Save the image path in the content field
        }
        // Handle Text Content - only if image is not uploaded
        elseif ($request->filled('section_content')) {
            $content->content = $request->input('section_content'); // Save the text in the content field
        }

        // Save the content (either create or update)
        $content->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Информация успешно обновлена!');
    }
}
