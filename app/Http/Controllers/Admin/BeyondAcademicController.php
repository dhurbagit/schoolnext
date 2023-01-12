<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BeyondAcademic;
use App\Models\Academic_gallery;
use App\Http\Controllers\Controller;

class BeyondAcademicController extends Controller
{
    public function index()
    {
        // dd('this');
        return view('admin.beyond_academic.form');
    }
    public function view()
    {   $beyound_g = BeyondAcademic::orderBy('id', 'DESC')->get();
        return view('admin.beyond_academic.index', compact('beyound_g'));
    }
    public function update_list($id)
    {
        $beyond_edit = BeyondAcademic::findOrFail($id);
        return view('admin.beyond_academic.form', compact('beyond_edit'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'editor1' => 'required',
            'feature_image' => 'required|mimes:png,jpg,svg,webp,jpeg',

        ]);

        // dd($request->all());
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['title_category_slug'] = Str::slug($request->title);
        $input['title'] = $request->title;
        $input['description'] = $request->editor1;
        if ($request->hasFile('feature_image')) {
            $input['feature_image'] = $request->file('feature_image')->store('beyound', 'uploads');
        }
        $beyound = BeyondAcademic::create($input);

        if (!empty($request->small_title && $request->small_image)) {

            foreach($request->small_title as $index => $title){
                $imgName = $request->small_image[$index]->store('beyoundgallery', 'uploads');
                $beyound->text_title()->create(
                    ['title' => $title,
                    'images' => $imgName
                ]);
            }
        }
        return redirect()->back()->with('message', 'Record added successfully!');

    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'editor1' => 'required',
        ]);
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['title_category_slug'] = Str::slug($request->title);
        $input['title'] = $request->title;
        $input['description'] = $request->editor1;
        $album = BeyondAcademic::find($id);

        if ($request->hasFile('feature_image')) {
            unlink("uploads/" . $album->feature_image);
            $input['feature_image'] = $request->file('feature_image')->store('beyound', 'uploads');

        }

        $album->update($input);

        if ($request->hasFile('small_image') && $request->small_title) {
            // dd($request->small_title, $request->small_image);

            // foreach (array_combine($request->small_title, $request->small_image) as $t_text => $image) {
            //     $imgName = $image->store('beyoundgallery', 'uploads');
            //     $album->text_title()->create(['title' => $t_text, 'images' => $imgName]);
            // }

            foreach($request->small_title as $index => $title){
                $imgName = $request->small_image[$index]->store('beyoundgallery', 'uploads');
                $album->text_title()->create(
                    ['title' => $title,
                    'images' => $imgName
                ]);
            }
        }

        return redirect()->back()->with('message', 'Album updated successufully!');

    }
    public function delete($id)
    {
        $delete_Academic = BeyondAcademic::find($id);
        $galleries = $delete_Academic->text_title()->get();
        foreach ($galleries as $gallery) {
            unlink("uploads/" . $gallery->images);
        }
        unlink("uploads/" . $delete_Academic->feature_image);
        $delete_Academic->delete();
        return redirect()->back()->with('message', "Gallery deleted successfully!");
    }
    public function beyondGallery_delete($id)
    {
        $gallery = Academic_gallery::find($id);
        unlink('uploads/'. $gallery->images);
        $gallery->delete();
        return redirect()->back()->with('message', 'Record deleted successfully!');
        // dd($id);
    }
}
