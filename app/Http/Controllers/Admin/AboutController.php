<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function view()
    {
        // $about_content
        $aboutContent = About::get()->first();
        return view('admin.about.form', compact('aboutContent'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'small_title' => 'required|max:50',
            'main_title' => 'required|max:150',
            'slogan' => 'required',
            'editor1' => 'required',
        ]);

        $about_us = new About();
        $about_us->small_title = $request->small_title;
        $about_us->main_title = $request->main_title;
        $about_us->slogan = $request->slogan;
        $about_us->description = $request->editor1;
        if ($request->file('about_image')) {
            $file = $request->file('about_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
            $file->move(public_path('aboutus/'), $file_name);
            $about_us->image = $file_name;
        }

        $about_us->save();

        return redirect()->back()->with('message', 'Data save successfully !');

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'small_title' => 'required|max:50',
            'main_title' => 'required|max:150',
            'slogan' => 'required',
            'editor1' => 'required',
        ]);

        $about_us = About::findOrFail($id);
        $about_us->small_title = $request->small_title;
        $about_us->main_title = $request->main_title;
        $about_us->slogan = $request->slogan;
        if ($request->file('about_image')) {
            if (file_exists(public_path('aboutus/'. $about_us->image))) {

                unlink("aboutus/" . $about_us->image);
            }
            $file = $request->file('about_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
            $file->move(public_path('aboutus/'), $file_name);
            $about_us->image = $file_name;
        }

        $about_us->description = $request->editor1;
        $about_us->update();

        return redirect()->back()->with('message', 'Data save successfully !');
    }
}
