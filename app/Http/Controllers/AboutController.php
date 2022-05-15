<?php

namespace App\Http\Controllers;

use App\Http\Requests\createAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }


    public function create()
    {
        return view('admin.about.create');
    }


    public function store(createAboutRequest $request)
    {
        $about = new About();
        $about->font = $request->font;
        $about->color = $request->color;
        $about->about = $request->about;
        $about->save();
        session()->flash('store', 'عملیات بارگذاری اطلاعات به درستی انجام شد ');
        return redirect()->route('about.create');
    }


    public function show($about)
    {
        $about = About::findOrFail($about);
        return $about;
    }


    public function edit(About $about)
    {
        //
    }

    public function update(Request $request, About $about)
    {
        //
    }


    public function destroy($about)
    {
        About::destroy($about);
        session()->flash('delete', 'عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('about.index');
    }
}
