<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mvo;
use Illuminate\Http\Request;

class MvoController extends Controller
{
    //
    public function view_list()
    {

        $mov_list =  Mvo::get();
        return view('admin.mvo.list-view', compact('mov_list'));
    }

    public function edit($id)
    {
        // dd('this');
        $mvo_edit = Mvo::findOrFail($id);
        // dd($mvo_edit);
        return view('admin.mvo.form', compact('mvo_edit'));

    }

    public function view()
    {
        return view('admin.mvo.form');
    }

    public function store(Request $request)
    {

        $request->validate([
            'mvo_title' => 'required',
            'editor2' => 'required',
        ]);
        $mvo_store = new Mvo();
        $mvo_store->title = $request->mvo_title;
        $mvo_store->description = $request->editor2;
        $mvo_store->save();

        return redirect()->back()->with('message', 'mvo created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mvo_title' => 'required',
            'editor2' => 'required',
        ]);
        $mvo_store = Mvo::findOrFail($id);
        $mvo_store->title = $request->mvo_title;
        $mvo_store->description = $request->editor2;
        $mvo_store->update();

        return redirect()->back()->with('message', 'mvo Updated successfully');
    }

    public function delete($id){
        $move_delete = Mvo::findOrFail($id);
        $move_delete->delete();
        return redirect()->back()->with('message', 'Record deleted successfully!');
    }
}
