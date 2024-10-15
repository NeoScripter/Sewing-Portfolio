<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $categoryId = $request->input('category_id');

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'images' => 'required',
            'images.*' => 'image|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'category_' . $categoryId)->withInput();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('images', 'public');
                Image::create([
                    'category_id' => $categoryId,
                    'image_path' => $imagePath
                ]);
            }
            return redirect()->back()->with('success', 'Фотографии успешно добавлены!');
        }
        return redirect()->back()->with('success', 'Не выбрано ни одной фотографии для добавления!');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return redirect()->back()->with('success', 'Фотография успешно удалена!');
    }
}
