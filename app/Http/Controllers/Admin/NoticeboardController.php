<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticeboard;
use Illuminate\Http\Request;

class NoticeboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.noticeboard.form');
    }

    public function view()
    {
        $list_noticeboard = Noticeboard::latest()->get();
        return view('admin.noticeboard.index', compact('list_noticeboard'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'editor2' => 'required',
        ]);

        $notice_board = new Noticeboard();
        $notice_board->date = $request->date;
        $notice_board->description = $request->editor2;
        $notice_board->save();

        return redirect()->back()->with('message', 'Record added successfully');
    }

    public function delete($id)
    {

        $delte_noticeboard = Noticeboard::findOrFail($id);
        $delte_noticeboard->delete();

        return redirect()->back()->with('message', 'Record deleted successfully!');
    }

    public function edit($id){
        $edit_noticeboard = Noticeboard::findOrFail($id);
        return view('admin.noticeboard.form', compact('edit_noticeboard'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'date' => 'required',
            'editor2' => 'required',
        ]);

        $notice_board = Noticeboard::findOrFail($id);
        $notice_board->date = $request->date;
        $notice_board->description = $request->editor2;
        $notice_board->update();

        return redirect()->back()->with('message', 'Record Updated successfully');
    }
}
