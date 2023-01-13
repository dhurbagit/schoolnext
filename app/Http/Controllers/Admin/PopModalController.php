<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopModal;
use Illuminate\Http\Request;

class PopModalController extends Controller
{
    //
    public function index()
    {
        $lists = PopModal::orderBy('id', 'DESC')->get();
        return view('admin.popUp.index', compact('lists'));

    }

    public function view()
    {
        return view('admin.popUp.form');
    }

    public function edit($id)
    {
        $editList = PopModal::find($id);
        return view('admin.popUp.form', compact('editList'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'image' => 'required',

        ]);

        $input['modal_title'] = $request->modal_title;
        $input['hide'] = isset($request->hide[0]) ? 1 : 0;
        $input['link'] = $request->link;
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('popUpModal', 'uploads');
        }
        if ($request->hasFile('file')) {
            $input['file'] = $request->file('file')->store('popUpModal', 'uploads');
        }
        PopModal::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }

    public function delete($id)
    {
        $delete = PopModal::find($id);
        if (!empty($delete->image)) {
            unlink('uploads/' . $delete->image);
        }
        if (!empty($delete->file)) {
            unlink('uploads/' . $delete->file);
        }

        $delete->delete();
        return redirect()->back()->with('message', 'Record Deleted successfully !');
    }

    public function update(Request $request, $id)
    {

        $update = PopModal::find($id);
        $input['modal_title'] = $request->modal_title;
        $input['hide'] = isset($request->hide[0]) ? 1 : 0;
        $input['link'] = $request->link;
        if ($request->hasFile('image')) {
            unlink('uploads/' . $update->image);
            $input['image'] = $request->file('image')->store('popUpModal', 'uploads');
        }
        if ($request->hasFile('file')) {
            unlink('uploads/' . $update->file);
            $input['file'] = $request->file('file')->store('popUpModal', 'uploads');
        }
        $update->update($input);
        return redirect()->back()->with('message', 'Record Updated successfully !');
    }
}
