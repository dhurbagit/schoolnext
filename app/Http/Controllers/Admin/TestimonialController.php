<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    //
    public function index(){
        return view('admin.testimonial.form');
    }
    public function view(){
        $testimonial = Testimonial::orderBy('id', 'desc')->paginate(5);
        return view('admin.testimonial.index', compact('testimonial'));
    }
    public function store(Request $request){
        $request->validate([
            'testimonial_title' => 'required|max:191',
            'testimonial_designation' => 'required|max:100',
            'editor1' => 'required',
            'testimonial_image' => 'required|mimes:svg,webp,png,jpg,jpeg',
        ]);

        $testimonial = new Testimonial();
        $testimonial->title = $request->testimonial_title;
        $testimonial->designation = $request->testimonial_designation;
        $testimonial->hide = isset($request->hide_show[0]) ? 1: 0;
        $testimonial->description = $request->editor1;

        if($request->file('testimonial_image')){
            $file = $request->file('testimonial_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('testimonial/'), $file_name);
            $testimonial->images = $file_name;
        }


        $testimonial->save();

        return back()->with('message', 'Testimonial created sucessfully !');
    }

    public function delete($id)
    {
       $delete_testimonial = Testimonial::findOrFail($id);
       unlink("testimonial/". $delete_testimonial->images);
       $delete_testimonial->delete();
       return redirect()->back()->with('message', 'Testimonial deleted successfully!');
    }
    public function edit($id)
    {
        $testimonial_edit = Testimonial::findOrFail($id);
        return view('admin.testimonial.form', compact('testimonial_edit'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'testimonial_title' => 'required|max:191',
            'testimonial_designation' => 'required|max:100',
            'editor1' => 'required',

        ]);


        $testimonial = Testimonial::findOrFail($id);
        $testimonial->title = $request->testimonial_title;
        $testimonial->designation = $request->testimonial_designation;
        $testimonial->hide = isset($request->hide_show[0]) ? 1: 0;
        $testimonial->description = $request->editor1;

        if($request->file('testimonial_image')){
            if(file_exists(public_path("testimonial/". $testimonial->images))){
                unlink("testimonial/". $testimonial->images);
            }

            $file = $request->file('testimonial_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('testimonial/'), $file_name);
            $testimonial->images = $file_name;
        }


        $testimonial->save();

        return redirect()->back()->with('message', "testimonail update successfully !");

    }
}
