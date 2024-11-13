<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('created_at', 'desc')->paginate(9);
        return view('gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/gallery', $filename);

                GalleryImage::create([
                    'filename' => $filename,
                    'original_filename' => $image->getClientOriginalName(),
                    'mime_type' => $image->getMimeType(),
                    'size' => $image->getSize()
                ]);
            }

            return redirect()->back()->with('status', __('names.imagesUploaded'));
        }

        return redirect()->back()->with('error', __('names.noImagesSelected'));
    }

    public function show(GalleryImage $image)
    {
        return view('gallery.show', compact('image'));
    }

    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        Storage::delete('public/gallery/' . $image->filename);
        $image->delete();

        return redirect()->route('gallery.index')->with('status', __('names.imageDeleted'));
    }
}
