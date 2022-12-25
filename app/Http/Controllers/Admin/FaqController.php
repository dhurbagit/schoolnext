<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Faq_collection;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{

    public function index()
    {
        $lists = Faq::get()->first();
        return view('admin.faq.form', compact('lists'));
    }

    public function view()
    {
        $faq_list = Faq_collection::orderBy('id', 'DESC')->get();
        return view('admin.faq.index', compact('faq_list'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_title' => 'required',

        ]);
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['long_title'] = $request->long_title;
        $input['slug'] = Str::slug($request->title);
        Faq::create($input);
        return redirect()->back()->with('message', 'Record added successfully!');
    }
    public function save(Request $request)
    {
        $request->validate([
            'faq_head' => 'required',
            'faq_detail' => 'required',

        ]);
        $input['faq_head'] = $request->faq_head;
        $input['faq_detail'] = $request->faq_detail;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['slug'] = Str::slug($request->faq_head);

        Faq_collection::create($input);
        return redirect()->back()->with('message', 'Record added successfully!');
    }
    public function faq_delete($id)
    {
        $faq_delete = Faq_collection::find($id);
        $faq_delete->delete();
        return redirect()->back()->with('message', 'Record deleted successfully!');
    }
    public function faq_update(Request $request, $id)
    {
        $request->validate([
            'faq_head' => 'required',
            'faq_detail' => 'required',

        ]);
        $update  = Faq_collection::find($id);
        $input['faq_head'] = $request->faq_head;
        $input['faq_detail'] = $request->faq_detail;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['slug'] = Str::slug($request->faq_head);
        $update->update($input);

        return redirect()->back()->with('message', 'Record updated successfully!');

    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_title' => 'required',

        ]);
        $update  = Faq::find($id);
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['long_title'] = $request->long_title;
        $input['slug'] = Str::slug($request->title);
        $update->update($input);
        return redirect()->back()->with('message', 'Record added successfully!');
    }
}
