<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    //
    public function index_chairman()
    {
        $chairman = MessageFrom::where('type', 0)->orderBy('id', 'DESC')->first();
        return view('admin.messagefrom.chairman', compact('chairman'));
    }

    public function store(Request $request)
    {

        $chairman_message = '0';
        $request->validate([
            'message_title' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $input['message_title'] = $request->message_title;
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['type'] = $chairman_message;
        $input['slug'] = Str::slug($request->message_title);
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('chairman', 'uploads');
        }
        MessageFrom::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }

    public function update(Request $request)
    {

        $request->validate([
            'message_title' => 'required',
            'name' => 'required',
            'description' => 'required',

        ]);

        $input['message_title'] = $request->message_title;
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['slug'] = Str::slug($request->message_title);
        $MessageFrom = MessageFrom::where('type', 0)->orderBy('id', 'DESC')->first();
        if ($request->hasFile('image')) {
            unlink('uploads/' . $MessageFrom->image);
            $input['image'] = $request->file('image')->store('chairman', 'uploads');
        }
        $MessageFrom->update($input);

        return redirect()->back()->with('message', 'Record added successfully !');
    }

    public function index_principal(Request $request)
    {
        // dd('');
        $principal_m = MessageFrom::where('type', 1)->orderBy('id', 'DESC')->first();
        return view('admin.messagefrom.principal', compact('principal_m'));
    }

    public function save(Request $request)
    {

        $principal_message = '1';
        $request->validate([
            'message_title' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $input['message_title'] = $request->message_title;
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['type'] = $principal_message;
        $input['slug'] = Str::slug($request->message_title);
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('chairman', 'uploads');
        }
        MessageFrom::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }
    public function principal_update(Request $request)
    {
        $request->validate([
            'message_title' => 'required',
            'name' => 'required',
            'description' => 'required',

        ]);

        $input['message_title'] = $request->message_title;
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['slug'] = Str::slug($request->message_title);
        $MessageFrom = MessageFrom::where('type', 1)->orderBy('id', 'DESC')->first();
        if ($request->hasFile('image')) {
            unlink('uploads/' . $MessageFrom->image);
            $input['image'] = $request->file('image')->store('chairman', 'uploads');
        }
        $MessageFrom->update($input);

        return redirect()->back()->with('message', 'Record added successfully !');
    }

}
