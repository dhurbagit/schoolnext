<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VideoController extends Controller
{
    //
    public function view_form()
    {
        $banner_video = Video::where('type', '=', 0)->orWhere('type', '=', 10)->first();
        // dd($banner_video);
        return view('admin.slider.banner-video', compact('banner_video'));
    }
    public function save_video(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'video' => 'required',
        ]);

        $banner_video = new Video();
        $banner_video->title = $request->title;
        if($request->file('video')){
            $file = $request->file('video');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('uploads/video/'), $file_name);
            $banner_video->video = $file_name;
        }
        $banner_video->type = isset($request->hide_show[0]) ? 0 : 10;
        $banner_video->save();

        return redirect()->back()->with('message', 'Record added successfully!');

    }
    public function update_video(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $banner_video =  Video::findOrFail($id);
        $banner_video->title = $request->title;
        if($request->file('video')){
            unlink("uploads/video/". $banner_video->video);
            $file = $request->file('video');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber.$file->getClientOriginalName();
            $file->move(public_path('uploads/video/'), $file_name);
            $banner_video->video = $file_name;
        }
        $banner_video->type = isset($request->hide_show[0]) ? 0 : 10;
        $banner_video->update();

        return redirect()->back()->with('message', 'Record update successfully !');
    }
}
