<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\NewsEvent;
use App\Models\Noticeboard;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;

class HomeController extends Controller
{
    //
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
        $galleries = Gallery::latest()->get()->random(15)->all();

        // dd($galleries);
        return view('frontend.index', compact('slider', 'client', 'setting_happy', 'happy_counter', 'about_us', 'newsevent','noticeboard', 'testimonial', 'galleries'));
    }

}
