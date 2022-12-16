<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
            'album_title' => 'required',
            'album_images' => 'nullable|mimes:png,jpg,svg,webp,jpeg',
        ]);


        $input['publish_status'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['slug'] = Str::slug($request->album_title);
        $input['title'] = $request->album_title;
        if($request->hasFile('album_images')) {
            $input['image'] = $request->file('album_images')->store('album', 'uploads');
        }
        $album = Album::create($input);

        if (!empty($request->gallery_images)) {
            foreach ($request->gallery_images as $img) {
                $imgName = $img->store('gallery', 'uploads');
                $album->images()->create(['image' => $imgName]);

            }
        }
        return redirect()->back()->with('message', 'successfully gallery created!');

    }
    public function view()
    {
        $albums = Album::withCount('images')->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function delete($id)
    {
        $delete_album = Album::find($id);
        // dd($delete_album);

        $galleries = $delete_album->images()->get();

        foreach ($galleries as $gallery) {
            unlink("uploads/" . $gallery->image);
        }
        unlink("uploads/" . $delete_album->image);
        $delete_album->delete();

        return redirect()->back()->with('message', "Album deleted successfully!");

    }

    public function edit($id)
    {
        $album_edit = Album::find($id);
        return view('admin.albums.form', compact('album_edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'album_title' => 'required',
            'album_images' => 'nullable|mimes:png,jpg,svg,webp,jpeg',
        ]);
        $input['publish_status'] = isset($request->hide_show[0]) ? 1 : 0;
        $input['slug'] = Str::slug($request->album_title);
        $input['title'] = $request->album_title;
        $album = Album::find($id);

        if ($request->hasFile('album_images')) {
            unlink("uploads/" . $album->image);
            $input['image'] = $request->file('album_images')->store('album', 'uploads');

        }

        $album->update($input);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->gallery_images as $img) {
                $imgName = $img->store('gallery', 'uploads');
                $album->images()->create(['image' => $imgName]);
            }
        }

        return redirect()->back()->with('message', 'Album updated successufully!');

    }
    public function gallery_delete($id)
    {
        $gallery =  Gallery::findOrFail($id);
        unlink("uploads/" . $gallery->image);
        $gallery->delete();
        return Redirect()->back()->with('message', 'Gallery image deleted successuflly!');
    }
}
