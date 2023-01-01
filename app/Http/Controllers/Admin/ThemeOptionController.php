<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeOption;
use Illuminate\Http\Request;

class ThemeOptionController extends Controller
{
    //
    public function index()
    {
        $update_thms = ThemeOption::first();
        return view('admin.theme-option.index', compact('update_thms'));
    }

    public function store(Request $request)
    {
        $input['primary_color'] = $request->primary_color;
        $input['secondary_color'] = $request->secondary_color;
        $input['footer_color'] = $request->footer_color;
        ThemeOption::create($input);

        return back()->with('message', 'Data added success');
    }
    public function update(Request $request, $id)
    {
        $update = ThemeOption::find($id);
        $input['primary_color'] = $request->primary_color;
        $input['secondary_color'] = $request->secondary_color;
        $input['footer_color'] = $request->footer_color;
        $update->update($input);
        return back()->with('message', 'Data updated success');
    }
}
