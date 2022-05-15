<?php

namespace App\Http\Controllers;

use App\Http\Requests\createGalleryRequest;
use App\Http\Requests\updateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(createGalleryRequest $request)
    {
        $gallery = new Gallery();
        $file = $request->file('image');
        if (!empty($file)) {
            $image = $file->getClientOriginalName();
            $pathImage = 'images/gallery/' . $image;
            if (fileExists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/gallery', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        session()->flash('store', 'عملیات بارگذاری با موفقیت انجام شد');
        return redirect()->route('gallery.create');
    }

    public function show($gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        return $gallery;
    }

    public function edit($gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(updateGalleryRequest $request, $gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        $file = $request->file('image');
        if (empty($file)) {
            $image = $gallery->image;
            $gallery->image = $image;
        } else {
            $imageDelete = $gallery->image;
            $pathDelete = 'images/gallery/' . $imageDelete;
            unlink($pathDelete);
            $image = $file->getClientOriginalName();
            $pathImage = 'images/gallery/' . $image;
            if (fileExists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/gallery', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        session()->flash('update', 'عملیات بروز رسانی با موفقیت انجام شد');
        return redirect()->route('gallery.index');
    }

    public function destroy($galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
        $deleteImage = 'images/gallery/' . $gallery->image;
        unlink($deleteImage);
        Gallery::destroy($galleryId);
        session()->flash('delete', 'عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('gallery.index');
    }
}
