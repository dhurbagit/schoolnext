<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class AlbumController extends Controller
{
    //
    public function index()
    {
        return view('admin.albums.form');
    }
    public function store(Request $request)
    {

        $request->validate([
            'album_title'=> 'required',
            'album_images' => 'nullable|mimes:png,jpg,svg,webp,jpeg',
        ]);

        $input = $request->all();
        $input['publish_status'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['slug'] = Str::slug($request->album_title);
        $input['title'] = $request->album_title;
        if($request->hasFile('album_images')){
            $input['image'] = $request->file('album_images')->store('album','uploads');
        }
        $album = Album::create($input);
        if(!empty($request->gallery_images))
        {
            foreach($request->gallery_images as $img)
            {
                $imgName = $img->store('gallery','uploads');
                $album->images()->create(['image'=>$imgName]);

            }
        }
        return redirect()->back()->with('message', 'successfully gallery created!');

    }
    public function view(){
        $albums = Album::withCount('images')->get();

        return view('admin.albums.index', compact('albums'));
    }

    public function delete($id){
        $delete_album = Album::find($id);
        // dd($delete_gallery);
        // unlink("uploads/".$delete_gallery->image);

        unlink("uploads/".$delete_album->image);
        $delete_album->delete();

        return redirect()->back()->with('message', "Album deleted successfully!");

    }

    public function edit($id){
        $album_edit = Album::find($id);
        return view('admin.albums.form', compact('album_edit'));
    }
}
