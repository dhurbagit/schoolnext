<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    //
    public function index(){
        return view('admin.newsEvent.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'editor2' => 'required',
            'image' => 'required|mimes:png,jpg,svg,webp,jpeg',
        ]);

        $store_record = new NewsEvent();
        $store_record->title = $request->title;
        $store_record->date = $request->date;
        $store_record->description = $request->editor2;
        if($request->file('image')){
            $file = $request->file('image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('NewsEvent/'), $file_name);
            $store_record->images = $file_name;
        }
        $store_record->save();

        return redirect()->back()->with('message', 'record inserted successfuly !');
    }
    public function view_list(){
        $newsevent_list = NewsEvent::orderBy('id', 'DESC')->get();
        return view('admin.newsEvent.index', compact('newsevent_list'));
    }

    public function delete($id)
    {
        $deleteEvent = NewsEvent::findOrFail($id);
        unlink("NewsEvent/" . $deleteEvent->images);
        $deleteEvent->delete();
        return redirect()->back()->with('message', 'Record Deleted successfuly !');
    }

    public function edit($id){

        $edit_mvo = NewsEvent::findOrFail($id);
        return view('admin.newsEvent.form', compact('edit_mvo'));

    }

    public function update(Request $request , $id)
    {
            // dd($request->all());
            $request->validate([
                'title' => 'required',
                'date' => 'required',
                'editor2' => 'required',
            ]);

            $update_record = NewsEvent::findOrFail($id);
            $update_record->title = $request->title;
            $update_record->date = $request->date;
            $update_record->description = $request->editor2;
            if($request->file('image')){
                unlink("NewsEvent/". $update_record->images);
                $file = $request->file('image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber.$file->getClientOriginalName();
                $file->move(public_path('NewsEvent/'), $file_name);
                $update_record->images = $file_name;
            }
            $update_record->update();

            return redirect()->back()->with('message', 'record updated successfuly !');

    }
}
