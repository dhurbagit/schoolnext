<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Album;
use App\Models\BeyondAcademic;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Mvo;
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
        return view('frontend.index', compact('slider', 'client', 'setting_happy', 'happy_counter', 'about_us', 'newsevent', 'noticeboard', 'testimonial', 'galleries', 'banner_video'));
    }

    public function about_view()
    {
        return view('frontend.about');
    }

    public function page($title)
    {
        $menu_content = Menu::where('title_slug', $title)->first();
        return view('frontend.general', compact('menu_content'));
    }
    public function category($slug)
    {
        // dd('category');
        $menu = Menu::where('category_slug', $slug)->first();

        switch ($slug) {
            case 'home':
                return redirect()->route('index');
                break;
            case 'about':
                $menu_content = $menu;
                $abouts = About::get()->first();
                $mvo_contents = Mvo::get();
                return view('frontend.about', compact('abouts', 'mvo_contents', 'menu_content'));
            case 'beyond academic':
                $beyond_content = BeyondAcademic::latest()->simplePaginate(3);
                return view('frontend.beyond_academic', compact('beyond_content'));
                break;
            case 'news events':
                $menu_content1 = $menu;
                $news_template = NewsEvent::get();
                return view('frontend.newsevent.archive', compact('news_template', 'menu_content1'));
            case 'gallery':
                $gallery = Album::where('publish_status', 1)->get();
                return view('frontend.album.gallery', compact('gallery', 'menu'));

            default:
                return 'Not Found';
        }
    }

    public function gallery_images($slug)
    {
        $album_gallery = Album::where(['slug' => $slug, 'publish_status' => 1])->first();
        return view('frontend.album.show', compact('album_gallery'));
    }

    public function newsevent_single($id)
    {
        $using_function = $this->category('news events');
        $menu_content = $using_function['menu_content1'];
        $single_news = NewsEvent::find($id);
        $latest_events = NewsEvent::latest('date')->get();
        return view('frontend.newsevent.show-single', compact('menu_content', 'single_news', 'latest_events'));
    }

}
