<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSliderRequest;
use App\Http\Requests\updateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class SliderController extends Controller
{

    public function index()
    {
        $slider = Slider::paginate(4);
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(createSliderRequest $request)
    {
        $slider = new Slider();
        $slider->alt = $request->alt;
        $slider->caption = $request->caption;
        $file = $request->file('image');
        if (!empty($file)) {
            $image = $file->getClientOriginalName();
            $pathImage = 'images/slider/' . $image;
            if (fileExists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/slider', $image);
            $slider->image = $image;
        }
        $slider->save();
        return redirect()->route('slider.create');
    }

    public function show($slider)
    {
        $slider = Slider::findOrFail($slider);
        return $slider;
    }


    public function edit($slider)
    {
        $slider = Slider::findOrFail($slider);
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(updateSliderRequest $request, $slider)
    {
        $slider = Slider::findOrFail($slider);
        $slider->alt = $request->alt;
        $slider->caption = $request->caption;
        $file = $request->file('image');
        if (empty($file)) {
            $image = $slider->image;
            $slider->image = $image;
        } else {
            $imageRecent = $slider->image;
            $pathDelete = 'images/slider/' . $imageRecent;
            unlink($pathDelete);
            $imageNow = $file->getClientOriginalName();
            $path = 'images/slider/' . $imageNow;
            if (fileExists($path)) {
                $imageNow = bin2hex(random_bytes(10)) . $imageNow;
            }
            $file->move('images/slider', $imageNow);
            $slider->image = $imageNow;
        }
        $slider->save();
        return redirect()->route('slider.index');
    }

    public function destroy($sliderId)
    {
        $slider = Slider::findOrFail($sliderId);
        $pathDelete = 'images/slider/' . $slider->image;
        unlink($pathDelete);
        Slider::destroy($sliderId);
        session()->flash('delete', 'عملیات پاک کردن دینا با موفقیت انجام شد');
        return redirect()->route('slider.index');
    }
}
