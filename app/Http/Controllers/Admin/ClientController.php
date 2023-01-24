<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('admin.client.form');
    }
    public function view()
    {
        $list_view = Client::get();
        return view('admin.client.index', compact('list_view'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:png,jpg,svg,webp,jpeg',
        ]);

        $store = new Client();
        $store->title = $request->title;
        $store->link = $request->link;
        if ($request->file('image')) {
            $file = $request->file('image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
            $file->move(public_path('client/'), $file_name);
            $store->image = $file_name;
        }
        $store->save();

        return redirect()->back()->with('message', 'Record Save successfully!');
    }
    public function delete($id)
    {
        $delete_list = Client::findOrFail($id);
        unlink("client/" . $delete_list->image);
        $delete_list->delete();

        return redirect()->back()->with('message', 'Record Deleted successfully!');
    }

    public function edit($id)
    {
        $edit_item = Client::findOrFail($id);
        return view('admin.client.form', compact('edit_item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $update = Client::findOrFail($id);
        $update->title = $request->title;
        $update->link = $request->link;
        if ($request->file('image')) {
            if (file_exists(public_path("client/" . $update->image))) {
                unlink("client/" . $update->image);
            }

            $file = $request->file('image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
            $file->move(public_path('client/'), $file_name);
            $update->image = $file_name;
        }
        $update->update();

        return redirect()->back()->with('message', 'Record Update successfully!');
    }
}
