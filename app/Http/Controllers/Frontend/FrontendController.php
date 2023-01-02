<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Mvo;
use App\Models\Menu;
use App\Models\About;
use App\Models\Album;
use App\Models\Video;
use App\Models\Almuni;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Content;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Download;
use App\Models\NewsEvent;
use App\Models\Teammember;
use App\Models\MessageFrom;
use App\Models\Noticeboard;
use App\Models\Testimonial;
use App\Models\AlmuniGallery;
use App\Models\BeyondAcademic;
use App\Models\Faq_collection;
use App\Models\Download_gallery;
use App\Http\Controllers\Controller;
use App\Models\Blog;

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
        $galleries = Gallery::latest()->get()->shuffle(15);
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
        //    if();

        $menu_content = Menu::where(['category_slug' => 'layout page', 'title_slug' => $title])->first();

        if ($menu_content) {
            return view('frontend.layout_page', compact('menu_content'));
        } else {
            $menu_content = Menu::where('title_slug', $title)->first();
            return view('frontend.general', compact('menu_content'));
        }

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
                $beyond_content = BeyondAcademic::where('hide', '1')->latest()->paginate(3);
                return view('frontend.beyond_academic', compact('beyond_content'));
                break;
            case 'news events':
                $menu_content1 = $menu;
                $news_template = NewsEvent::orderBy('id', 'DESC')->paginate(8);
                return view('frontend.newsevent.archive', compact('news_template', 'menu_content1'));
                break;
            case 'gallery':
                $menu = $menu;
                $gallery = Album::where('publish_status', 1)->get();
                return view('frontend.album.gallery', compact('gallery', 'menu'));
                break;
            case 'chairman message':
                $chairman_msg = MessageFrom::where('type', 0)->get()->first();
                $management_staff = Teammember::where('type', 1)->get();
                return view('frontend.messagefromstaff.chairman', compact('chairman_msg', 'management_staff'));
                break;
            case 'principal message':
                $chairman_msg = MessageFrom::where('type', 1)->get()->first();
                $management_staff = Teammember::where('type', 1)->get();
                return view('frontend.messagefromstaff.chairman', compact('chairman_msg', 'management_staff'));
                break;
            case 'management team':
                $menu_content1 = $menu;
                $management_staff = Teammember::where('type', 1)->get();
                return view('frontend.team_member.management_staff', compact('management_staff', 'menu_content1'));
                break;
            case 'teacher and staff':
                $menu_content1 = $menu;
                $management_staff = Teammember::where('type', 0)->get();
                return view('frontend.team_member.management_staff', compact('management_staff', 'menu_content1'));
                break;
            case 'Video':
                $menu_content1 = $menu;
                $video = Video::where(['type' => 2, 'hide' => 1])->orderBy('id', 'DESC')->get();
                return view('frontend.video', compact('video', 'menu_content1'));
                break;
            case 'Pass Out Student':
                $menu_content = $menu;
                $almuniCollection = Almuni::orderBy('id', 'DESC')->get();
                $almuni_g = AlmuniGallery::get();
                return view('frontend.almuni.archive', compact('almuniCollection', 'almuni_g', 'menu_content'));
                break;
            case 'Download files':
                $menu_content = $menu;
                $downloads = Download::get();
                $downloads_g = Download_gallery::paginate(6);
                return view('frontend.download', compact('downloads', 'menu_content', 'downloads_g'));
                break;
            case 'FAQs (& why school)':
                $whyschool = Faq::get()->first();
                $faqs = Faq_collection::where('hide', '=', '1')->get();
                $menu_content = $menu;
                $setting = Setting::get()->first();
                return view('frontend.faqs_andwhyschool', compact('whyschool', 'faqs', 'menu_content', 'setting'));
                break;
            case 'School Life':
                $menu_content = $menu;
                $Content = Content::orderBy('id', 'DESC')->take(1)->get();
                return view('frontend.school_life', compact('menu_content', 'Content'));
                break;
            case 'Blogs':
                $blogs_page = Blog::where('type', '5')->first();
                $blogs_collection = Blog::where('type', '10')->paginate(7);
                return view('frontend.blogs.archive', compact('blogs_page', 'blogs_collection'));
                break;
            case 'Contact Us':
                return view('frontend.contact_us');
            default:
                return 'Not Found';
        }
    }

    public function gallery_images($slug)
    {
        $using_function = $this->category('gallery');
        $menu = $using_function['menu'];

        $album_gallery = Album::where(['slug' => $slug, 'publish_status' => 1])->first();
        return view('frontend.album.show', compact('album_gallery', 'menu'));
    }

    public function newsevent_single($id)
    {
        $using_function = $this->category('news events');
        $menu_content = $using_function['menu_content1'];
        $single_news = NewsEvent::find($id);
        $latest_events = NewsEvent::latest('date')->get();
        return view('frontend.newsevent.show-single', compact('menu_content', 'single_news', 'latest_events'));
    }

    public function almuni_single($id)
    {
        $using_function = $this->category('Pass Out Student');
        $menu_content = $using_function['menu_content'];
        $almuni_g = AlmuniGallery::where('almuni_id', $id)->get();
        $almuniCollection = Almuni::orderBy('id', 'DESC')->get();
        return view('frontend.almuni.archive', compact('almuniCollection', 'almuni_g', 'menu_content'));
    }

    public function download_childdata($id)
    {
        // dd('this');
        $using_function = $this->category('Download files');
        $menu_content = $using_function['menu_content'];
        $downloads_g = Download_gallery::where('download_id', $id)->paginate();
        $downloads = Download::orderBy('id', 'DESC')->get();
        return view('frontend.download', compact('downloads', 'downloads_g', 'menu_content'));
    }

}
