<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teammember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeammemberController extends Controller
{
    //
    public function view()
    {
        $t_list = Teammember::where('type', 0)->orderBy('id', 'DESC')->get();
       return view('admin.team_member.generalIndex', compact('t_list'));
    }
    public function show(){
        return view('admin.team_member.general');
    }
    public function edit_general($id)
    {
        $edit_general = Teammember::find($id);
        return view('admin.team_member.general', compact('edit_general'));
    }
    public function store(Request $request)
    {
        $staffId = '0';
        $request->validate([
            'title' => 'required',
            'heading_one' => 'required',
            'heading_two' => 'required',
            'image' => 'required',
            'description' => 'required',
            'designation' => 'required',
        ]);

        $input['title'] = $request->title;
        $input['heading_one'] = $request->heading_one;
        $input['heading_two'] = $request->heading_two;
        $input['type'] = $staffId;
        $input['description'] = $request->description;
        $input['designation'] = $request->designation;
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('Team Member', 'uploads');
        }
        Teammember::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }
    public function delete($id)
    {
        $delete = Teammember::find($id);
        unlink("uploads/". $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record deleted successfully !');
    }
    public function update_general(Request $request , $id){

        $request->validate([
            'title' => 'required',
            'heading_one' => 'required',
            'heading_two' => 'required',
            'description' => 'required',
            'designation' => 'required',
        ]);
        $save = Teammember::find($id);
        $input['title'] = $request->title;
        $input['heading_one'] = $request->heading_one;
        $input['heading_two'] = $request->heading_two;
        $input['description'] = $request->description;
        $input['designation'] = $request->designation;
        if ($request->hasFile('image')) {
            unlink('uploads/'. $save->image);
            $input['image'] = $request->file('image')->store('Team Member', 'uploads');
        }

        $save->update($input);

        return redirect()->back()->with('message', 'Record added successfully !');
    }

    public function view_management()
    {
        $t_list = Teammember::where('type', 1)->orderBy('id', 'DESC')->get();
        return view('admin.team_member.managementIndex', compact('t_list'));
    }
    public function management_show()
    {
       return view('admin.team_member.management');
    }
    public function management_store(Request $request)
    {
        $staffId = '1';
        $request->validate([
            'title' => 'required',
            'heading_one' => 'required',
            'heading_two' => 'required',
            'image' => 'required',
            'description' => 'required',
            'designation' => 'required',
        ]);

        $input['title'] = $request->title;
        $input['heading_one'] = $request->heading_one;
        $input['heading_two'] = $request->heading_two;
        $input['type'] = $staffId;
        $input['description'] = $request->description;
        $input['designation'] = $request->designation;
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('Team Member', 'uploads');
        }
        Teammember::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }
    public function edit_management($id)
    {
        $edit_management = Teammember::find($id);
        return view('admin.team_member.management', compact('edit_management'));
    }
    public function update_management(Request $request , $id)
    {
        $request->validate([
            'title' => 'required',
            'heading_one' => 'required',
            'heading_two' => 'required',
            'description' => 'required',
            'designation' => 'required',
        ]);
        $save = Teammember::find($id);
        $input['title'] = $request->title;
        $input['heading_one'] = $request->heading_one;
        $input['heading_two'] = $request->heading_two;
        $input['description'] = $request->description;
        $input['designation'] = $request->designation;
        if ($request->hasFile('image')) {
            unlink('uploads/'. $save->image);
            $input['image'] = $request->file('image')->store('Team Member', 'uploads');
        }

        $save->update($input);

        return redirect()->back()->with('message', 'Record added successfully !');
    }
}
