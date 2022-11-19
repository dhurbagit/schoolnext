<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\NewsEvent;
use App\Models\Noticeboard;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Video;

class FrontendController extends Controller
{
    public function index()
    {
        $slider = Slider::where('hide', 1)->latest()->get();
        $client = Client::latest()->take(4)->get();
        $setting_happy = Setting::get()->first();
        $happy_counter = Counter::take(3)->get();
        $about_us = About::get()->first();
        $newsevent = NewsEvent::latest()->take(3)->get();
        $noticeboard = Noticeboard::latest()->get();
        $testimonial = Testimonial::where('hide', 1)->latest()->get();
        $galleries = Gallery::latest()->get()->shuffle(15)->all();
        $banner_video = Video::where('type', 0)->get()->first();



        // dd($banner_video);
        return view('frontend.index', compact('slider', 'client', 'setting_happy', 'happy_counter', 'about_us', 'newsevent','noticeboard', 'testimonial', 'galleries', 'banner_video'));
    }

    public function about_view()
    {
        return view('frontend.about');
    }

}
