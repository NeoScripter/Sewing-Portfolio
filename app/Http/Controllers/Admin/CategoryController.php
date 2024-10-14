<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.admin', compact('categories'));
    }

    // Show images for a specific gallery
    public function show(Category $category)
    {
        return view('admin.edit-category', compact('category'));
    }

    // Store a new image in the gallery
    public function storeImage(Request $request, Category $category)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'gallery_id' => $category->id,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.galleries.show', $category)->with('success', 'Image added successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'new_category_name' => 'required|string',
            'new_category_description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $validated['new_category_name'],
            'description' => $validated['new_category_description']
        ]);

        return redirect()->back()->with('success', 'Категория успешно добавлена!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'new_category_name' => 'required|string',
            'new_category_description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $validated['new_category_name'],
            'description' => $validated['new_category_description']
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена!');
    }

    // Delete an image from the gallery
    public function destroyImage(Image $image)
    {
        Storage::disk('public')->delete($image->image_path); // Remove from storage
        $image->delete(); // Remove from database

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
