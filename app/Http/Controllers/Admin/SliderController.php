<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){
        $slider_data = Slider::orderBy('id', 'desc')->paginate(5);
        return view('admin.slider.index', compact('slider_data'));
    }
    public function view()
    {
        return view('admin.slider.form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'=> 'required|max:50',
            'slider_image'=>'required|mimes:svg,webp,png,jpg,jpeg',
            'slider_caption' => 'required|max:50',
            'url_link' => 'nullable',
            'hide_show' => 'nullable'
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        if($request->file('slider_image')){
            $file = $request->file('slider_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('slider/'), $file_name);
            $slider->image = $file_name;
        }
        $slider->slider_caption = $request->slider_caption;
        $slider->url = $request->url_link;
        $slider->hide = isset($request->hide_show[0]) ? 1 : 0;
        $slider->save();

        return back()->with('message', 'slider created sucessfully !');

    }

    public function delete($id){

        $delete_slider = Slider::findorFail($id);
        unlink("slider/".$delete_slider->image);
        $for_msg = $delete_slider->delete();
        if($for_msg){
            return redirect()->back()->with('message', 'Slider deleted successfully !');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }

    }
    public function edit($id){
       $slider_edit = Slider::findorFail($id);
       return view('admin.slider.form', compact('slider_edit'));

    }

    public function update(Request $request, $id){



        $update_slider = Slider::find($id);

        $update_slider->title = $request->title;
        if($request->file('slider_image')){
            unlink("slider/".$update_slider->image);

            $file = $request->file('slider_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('slider/'), $file_name);
            $update_slider->image = $file_name;
        }
        $update_slider->slider_caption = $request->slider_caption;
        $update_slider->url = $request->url_link;
        $update_slider->hide = isset($request->hide_show[0]) ? 1 : 0;
        $update_slider->update();

        return back()->with('message', 'slider Update sucessfully !');

    }
}
