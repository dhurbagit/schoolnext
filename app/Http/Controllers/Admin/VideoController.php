<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

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
            'video' => 'required|mimes:mp4',
        ]);

        $banner_video = new Video();
        $banner_video->title = $request->title;
        if ($request->file('video')) {
            $file = $request->file('video');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
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

        $banner_video = Video::findOrFail($id);
        $banner_video->title = $request->title;
        if ($request->file('video')) {
            unlink("uploads/video/" . $banner_video->video);
            $file = $request->file('video');
            $generateNumber = random_int(100000, 999999);
            $file_name = $generateNumber . $file->getClientOriginalName();
            $file->move(public_path('uploads/video/'), $file_name);
            $banner_video->video = $file_name;
        }
        $banner_video->type = isset($request->hide_show[0]) ? 0 : 10;
        $banner_video->update();

        return redirect()->back()->with('message', 'Record update successfully !');
    }
    public function view()
    {
        $youtube_list = Video::where('type', 2)->get();
        return view('admin.youtube_video.index', compact('youtube_list'));
    }

    public function youtube_form()
    {
        return view('admin.youtube_video.form');
    }
    public function save_youtube(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required',

        ]);
        $youtubeId = 2;
        $input['title'] = $request->title;
        $input['video'] = $request->video;
        $input['type'] = $youtubeId;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        Video::create($input);
        return redirect()->back()->with('message', 'Record added successfully !');
    }

    public function delete_youtube($id)
    {
       $delete = Video::find($id);
       $delete->delete();
       return redirect()->back()->with('message', 'Record deleted successfully !');
    }
    public function edit_youtubeForm($id)
    {
       $edit_youtube = Video::where('type', 2)->find($id);
        return view('admin.youtube_video.form', compact('edit_youtube'));
    }
    public function update_youtube(Request $request , $id)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required',

        ]);
        $input['title'] = $request->title;
        $input['video'] = $request->video;
        $input['hide'] = isset($request->hide_show[0]) ? 1 : 0;
        $update = Video::find($id);
        $update->update($input);

        return redirect()->back()->with('message', 'Record Update successfully !');
    }
}
