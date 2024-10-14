<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'required|image|max:2048',
        ]);

        $category = Category::findOrFail($request->category_id);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('images', 'public');
                Image::create([
                    'category_id' => $category->id,
                    'image_path' => $imagePath
                ]);
            }
        }

        return redirect()->back()->with('success', 'Фотографии успешно добавлены!');
    }

    public function destroy(Image $image)
    {
        // Delete the image file from storage
        Storage::disk('public')->delete($image->image_path);

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Фотография успешно удалена!');
    }
}
