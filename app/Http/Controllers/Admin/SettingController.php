<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting_record =  Setting::get()->first();
        return view('admin.setting.form', compact('setting_record'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'after_banner_title' => 'required',
            'news_and_event_title' => 'required',
            'notice_board_title' => 'required',
            'Testimonial_title' => 'required',
            'testimonial_first_image' => 'required|mimes:png,jpg,svg,webp,jpeg',
            'testimonial_second_image' => 'required|mimes:png,jpg,svg,webp,jpeg',
            'gallery_title' => 'required',
            'address' => 'required',
            'Phone_one' => 'required',
            'email' => 'required',
            'logo' => 'required|mimes:png,jpg,svg,webp,jpeg',
            'footer_image' => 'required|mimes:png,jpg,svg,webp,jpeg',
        ]);
        $store = New Setting();
        $store->after_banner_title = $request->after_banner_title;
        $store->news_and_event_title = $request->news_and_event_title;
        $store->notice_board_title = $request->notice_board_title;
        $store->Testimonial_title = $request->Testimonial_title;
        if($request->file('testimonial_first_image')){
            $file = $request->file('testimonial_first_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store->testimonial_first_image = $file_name;
        }
        if($request->file('testimonial_second_image')){
            $file = $request->file('testimonial_second_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store->testimonial_second_image = $file_name;
        }
        $store->gallery_title = $request->gallery_title;
        $store->facebook = $request->facebook;
        $store->instagram = $request->instagram;
        $store->linkin = $request->linkin;
        $store->youtube = $request->youtube;
        $store->address = $request->address;
        $store->Phone_one = $request->Phone_one;
        $store->Phone_two = $request->Phone_two;
        $store->Phone_three = $request->Phone_three;
        $store->email = $request->email;
        if($request->file('logo')){
            $file = $request->file('logo');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store->logo = $file_name;
        }
        if($request->file('footer_image')){
            $file = $request->file('footer_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store->footer_image = $file_name;
        }
        $store->save();

        return redirect()->back()->with('message', 'Record added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'after_banner_title' => 'required',
            'news_and_event_title' => 'required',
            'notice_board_title' => 'required',
            'Testimonial_title' => 'required',
            'gallery_title' => 'required',
            'address' => 'required',
            'Phone_one' => 'required',
            'email' => 'required',
        ]);
        $store_update = Setting::findOrFail($id);
        $store_update->after_banner_title = $request->after_banner_title;
        $store_update->news_and_event_title = $request->news_and_event_title;
        $store_update->notice_board_title = $request->notice_board_title;
        $store_update->Testimonial_title = $request->Testimonial_title;
        if($request->file('testimonial_first_image')){
            unlink("setting/". $store_update->testimonial_first_image );
            $file = $request->file('testimonial_first_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store_update->testimonial_first_image = $file_name;
        }
        if($request->file('testimonial_second_image')){
            unlink("setting/". $store_update->testimonial_second_image );
            $file = $request->file('testimonial_second_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store_update->testimonial_second_image = $file_name;
        }
        $store_update->gallery_title = $request->gallery_title;
        $store_update->facebook = $request->facebook;
        $store_update->instagram = $request->instagram;
        $store_update->linkin = $request->linkin;
        $store_update->youtube = $request->youtube;
        $store_update->address = $request->address;
        $store_update->Phone_one = $request->Phone_one;
        $store_update->Phone_two = $request->Phone_two;
        $store_update->Phone_three = $request->Phone_three;
        $store_update->email = $request->email;
        if($request->file('logo')){
            unlink("setting/". $store_update->logo );
            $file = $request->file('logo');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store_update->logo = $file_name;
        }
        if($request->file('footer_image')){
            unlink("setting/". $store_update->footer_image );
            $file = $request->file('footer_image');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('setting/'), $file_name);
            $store_update->footer_image = $file_name;
        }
        $store_update->update();

        return redirect()->back()->with('message', 'Record Updated   successfully!');
    }

}
