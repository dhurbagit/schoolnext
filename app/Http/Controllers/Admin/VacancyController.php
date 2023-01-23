<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    //
    public function view()
    {
        $vacancy_list = Vacancy::orderBy('id', 'DESC')->where('type', '0')->get();
        $vacancy_update = Vacancy::where('type', '10')->first();
        return view('admin.vacancy.index', compact('vacancy_list', 'vacancy_update'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->hasFile('file')) {
            $input['file'] = $request->file('file')->store('vacancy', 'uploads');
        }
        Vacancy::create($input);

        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = Vacancy::find($id);

        if(!empty($delete->file)){
            unlink("uploads/" . $delete->file);
        }

        $delete->delete();
        return redirect()->back()->with('message', 'Vacancy deleted successfuly!');

    }

    public function save(Request $request)
    {
        $detail_type = '10';
        $input['title'] = $request->title;
        $input['bg_color'] = $request->bg_color;
        $input['type'] = $detail_type;

        Vacancy::create($input);
        return redirect()->back()->with('message','Record added successfully');
    }
    public function update(Request $request, $id)
    {
        $update = Vacancy::find($id);
        $input['title'] = $request->title;
        $input['bg_color'] = $request->bg_color;
        $update->update($input);

        return redirect()->back()->with('message','Record Updated successfully');

    }

}
