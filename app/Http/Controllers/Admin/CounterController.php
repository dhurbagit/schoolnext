<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    //
    public function index()
    {
        return view('admin.counter.form');
    }
    public function view()
    {
        $list = Counter::get();
        return view('admin.counter.index', compact('list'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'counter_number' => 'required',
        ]);

        $store = new Counter();
        $store->title = $request->title;
        $store->counter_number = $request->counter_number;
        $store->save();

        return redirect()->back()->with('message', 'Record save successflully');
    }

    public function delete($id){

        $delete_record = Counter::findOrFail($id);
        $delete_record->delete();

        return redirect()->back()->with('message', "Record deleted successfully!");
    }

    public function edit($id)
    {
        $edit_counter = Counter::findOrFail($id);
        return view('admin.counter.form', compact('edit_counter'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'counter_number' => 'required',
        ]);

        $store = Counter::findOrFail($id);
        $store->title = $request->title;
        $store->counter_number = $request->counter_number;
        $store->update();

        return redirect()->back()->with('message', 'Record Updated successflully');
    }
}
