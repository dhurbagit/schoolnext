<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Almuni;
use App\Models\AlmuniGallery;
use Illuminate\Http\Request;

class AlmuniController extends Controller
{
    //
    public function view()
    {
        $t_list = Almuni::get();
        $almuni_child = AlmuniGallery::get();

        return view('admin.almuni.index', compact('t_list', 'almuni_child'));
    }

    public function view_form()
    {
        return view('admin.almuni.form');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
        ]);

        $input['title'] = $request->title;
        $input['date'] = $request->date;
        Almuni::create($input);
        return redirect()->back()->with('message', 'successfully Almuni created!');
    }

    public function delete($id)
    {
        dd('this delter');
        $delete_Almuni = Almuni::find($id);

        $galleries = $delete_Almuni->A_images()->get();

        foreach ($galleries as $gallery) {
            unlink("uploads/" . $gallery->image);
        }
        $delete_Almuni->delete();

        return redirect()->back()->with('message', "Almuni deleted successfully!");

    }

    public function edit($id)
    {
        $edit_record = Almuni::find($id);
        $t_list = Almuni::get();
        $almuni_child = AlmuniGallery::get();
        return view('admin.almuni.index', compact('edit_record', 't_list', 'almuni_child'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
        ]);
        $update = Almuni::find($id);
        $input['title'] = $request->title;
        $input['date'] = $request->date;
        $update->update($input);

        return redirect()->route('Almuni.view')->with('message', 'Record update successfully');
    }

    public function gallery_save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'batch' => 'required',
            'percentage' => 'required',
            'almuni_id' => 'required',
            'class' => 'required',
        ]);
        $input['almuni_id'] = $request->almuni_id;
        $input['name'] = $request->name;
        $input['batch'] = $request->batch;
        $input['class'] = $request->class;
        $input['percentage'] = $request->percentage;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;

        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('almuni', 'uploads');
        }
        AlmuniGallery::create($input);
        return redirect()->back()->with('message', 'successfully Almuni created!');

    }

    public function almuni_gallery_delete($id)
    {
       $delete = AlmuniGallery::find($id);
       unlink("uploads/". $delete->image);
       $delete->delete();
        return redirect()->route('Almuni.view')->with('message', 'Record deleted successfully');
    }

    public function almuni_gallery_edit($id)
    {
        $edit_gallery = AlmuniGallery::find($id);
        $t_list = Almuni::get();
        $almuni_child = AlmuniGallery::get();
        return view('admin.almuni.index', compact('edit_gallery', 't_list', 'almuni_child'));
    }

    public function gallery_update(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'batch' => 'required',
            'percentage' => 'required',
            'almuni_id' => 'required',
            'class' => 'required',
        ]);
        $update = AlmuniGallery::find($id);
        $input['almuni_id'] = $request->almuni_id;
        $input['name'] = $request->name;
        $input['batch'] = $request->batch;
        $input['class'] = $request->class;
        $input['percentage'] = $request->percentage;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;

        if ($request->hasFile('image')) {
            unlink("uploads/". $update->image);
            $input['image'] = $request->file('image')->store('almuni', 'uploads');
        }
        $update->update($input);
        return redirect()->route('Almuni.view')->with('message', 'Record Update successfully');

    }
}

