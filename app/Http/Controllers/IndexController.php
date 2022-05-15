<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $setting = Setting::orderBy('id', 'desc')->take(1)->skip(0)->get();
        $slider = Slider::all();
        $about = About::orderBy('id', 'desc')->take(1)->skip(0)->get();
        $gallery=Gallery::all();
        return view('website.index', compact(['setting', 'slider','about','gallery']));
    }
}
