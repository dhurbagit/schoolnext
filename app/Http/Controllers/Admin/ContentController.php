<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentGallery;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function index()
    {
        $list = Content::orderBy('id', 'DESC')->get();
        return view('admin.school_life.index', compact('list'));
    }
    public function view()
    {
        return view('admin.school_life.form');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'description_one' => 'required',
            'featured_image' => 'required',
        ]);

        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['description_one'] = $request->description_one;
        if ($request->hasFile('featured_image')) {
            $input['featured_image'] = $request->file('featured_image')->store('school', 'uploads');
        }
        $save_schoollife = Content::create($input);
        if (!empty($request->small_image)) {
            foreach ($request->small_image as $picture) {
                $imageName = $picture->store('school', 'uploads');
                $save_schoollife->c_images()->create(['image' => $imageName]);
            }
        }
        return redirect()->back()->with('message', 'Record added successfully!');
    }
    public function delete($id)
    {

        $delete_schoollife = Content::find($id);

        unlink("uploads/" . $delete_schoollife->featured_image);
        $galleries = $delete_schoollife->c_images()->get();
        foreach ($galleries as $gallery) {
            unlink("uploads/" . $gallery->image);
        }

        $delete_schoollife->delete();
        return redirect()->back()->with('message', "Gallery deleted successfully!");
    }
    public function edit($id)
    {
        $records = Content::find($id);
        return view('admin.school_life.form', compact('records'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'description_one' => 'required',
        ]);
        $save_schoollife = Content::find($id);
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['description_one'] = $request->description_one;
        if ($request->hasFile('featured_image')) {
            if (file_exists(public_path('uploads/' . $save_schoollife->featured_image))) {
                unlink('uploads/' . $save_schoollife->featured_image);
            }
            $input['featured_image'] = $request->file('featured_image')->store('school', 'uploads');
        }

        if (!empty($request->small_image)) {
            foreach ($request->small_image as $picture) {
                $imageName = $picture->store('school', 'uploads');
                $save_schoollife->c_images()->create(['image' => $imageName]);
            }
        }
        $save_schoollife->update($input);
        return redirect()->back()->with('message', 'Record added successfully!');
    }
    public function delete_contentImage($id)
    {
        $delete = ContentGallery::find($id);
        unlink('uploads/' . $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record deleted successfully!');
    }
}
