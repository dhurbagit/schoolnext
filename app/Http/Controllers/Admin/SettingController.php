<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting_record = Setting::get()->first();
        return view('admin.setting.form', compact('setting_record'));
    }

    public function store(Request $request)
    {

        try {
            // dd($request->all());
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
            $store = new Setting();
            $store->school_name = $request->school_name;
            $store->google_map = $request->google_map;
            $store->powered_by = $request->powered_by;
            $store->powered_by_link = $request->powered_by_link;
            $store->message = $request->message;
            $store->view_counter = $request->view_counter;
            $store->after_banner_title = $request->after_banner_title;
            $store->news_and_event_title = $request->news_and_event_title;
            $store->notice_board_title = $request->notice_board_title;
            $store->Testimonial_title = $request->Testimonial_title;
            if ($request->file('testimonial_first_image')) {
                $file = $request->file('testimonial_first_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->testimonial_first_image = $file_name;
            }
            if ($request->file('testimonial_second_image')) {
                $file = $request->file('testimonial_second_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->testimonial_second_image = $file_name;
            }
            $store->gallery_title = $request->gallery_title;
            $store->facebook = $request->facebook;
            $store->Twitter = $request->Twitter;
            $store->instagram = $request->instagram;
            $store->linkin = $request->linkin;
            $store->youtube = $request->youtube;
            $store->pinterest = $request->pinterest;
            $store->tumblr = $request->tumblr;
            $store->address = $request->address;
            $store->Phone_one = $request->Phone_one;
            $store->Phone_two = $request->Phone_two;
            $store->Phone_three = $request->Phone_three;
            $store->email = $request->email;
            $store->success_message = $request->success_message;
            if ($request->file('logo')) {
                $file = $request->file('logo');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->logo = $file_name;
            }
            if ($request->file('footer_image')) {
                $file = $request->file('footer_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->footer_image = $file_name;
            }
            if ($request->file('f_brochure_file')) {
                $file = $request->file('f_brochure_file');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->f_brochure_file = $file_name;
            }
            if ($request->file('loginBg_images')) {
                $file = $request->file('loginBg_images');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->loginBg_images = $file_name;
            }
            if ($request->file('favIcon_image')) {
                $file = $request->file('favIcon_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store->favIcon_image = $file_name;
            }
            $store->save();

            return redirect()->back()->with('message', 'Record added successfully!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Please fill all the form');
        }

    }

    public function update(Request $request, $id)
    {

        try {
            // dd($request->all());

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
            $store_update->school_name = $request->school_name;
            $store_update->google_map = $request->google_map;
            $store_update->powered_by = $request->powered_by;
            $store_update->powered_by_link = $request->powered_by_link;
            $store_update->message = $request->message;
            $store_update->view_counter = $request->view_counter;
            $store_update->after_banner_title = $request->after_banner_title;
            $store_update->news_and_event_title = $request->news_and_event_title;
            $store_update->notice_board_title = $request->notice_board_title;
            $store_update->Testimonial_title = $request->Testimonial_title;
            if ($request->file('testimonial_first_image')) {
                unlink("setting/" . $store_update->testimonial_first_image);
                $file = $request->file('testimonial_first_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->testimonial_first_image = $file_name;
            }
            if ($request->file('testimonial_second_image')) {
                unlink("setting/" . $store_update->testimonial_second_image);
                $file = $request->file('testimonial_second_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->testimonial_second_image = $file_name;
            }
            $store_update->gallery_title = $request->gallery_title;
            $store_update->facebook = $request->facebook;
            $store_update->Twitter = $request->Twitter;
            $store_update->instagram = $request->instagram;
            $store_update->linkin = $request->linkin;
            $store_update->youtube = $request->youtube;
            $store_update->pinterest = $request->pinterest;
            $store_update->tumblr = $request->tumblr;
            $store_update->address = $request->address;
            $store_update->Phone_one = $request->Phone_one;
            $store_update->Phone_two = $request->Phone_two;
            $store_update->Phone_three = $request->Phone_three;
            $store_update->email = $request->email;
            $store_update->success_message = $request->success_message;
            if ($request->file('logo')) {
                unlink("setting/" . $store_update->logo);
                $file = $request->file('logo');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->logo = $file_name;
            }
            if ($request->file('footer_image')) {
                unlink("setting/" . $store_update->footer_image);
                $file = $request->file('footer_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->footer_image = $file_name;
            }
            if ($request->file('f_brochure_file')) {
                unlink("setting/" . $store_update->f_brochure_file);
                $file = $request->file('f_brochure_file');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->f_brochure_file = $file_name;
            }
            if ($request->file('loginBg_images')) {
                unlink("setting/" . $store_update->loginBg_images);
                $file = $request->file('loginBg_images');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->loginBg_images = $file_name;
            }
            if ($request->file('favIcon_image')) {
                unlink("setting/" . $store_update->favIcon_image);
                $file = $request->file('favIcon_image');
                $generateNumber = random_int(100000, 999999);
                $file_name = $generateNumber . $file->getClientOriginalName();
                $file->move(public_path('setting/'), $file_name);
                $store_update->favIcon_image = $file_name;
            }
            $store_update->update();

            return redirect()->back()->with('message', 'Record Updated   successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Please fill all form');
        }

    }

}
