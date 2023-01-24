<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Download_gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Download::orderBy('id', 'DESC')->get();
        $list_gallery = Download_gallery::orderBy('id', 'DESC')->get();
        return view('admin.downloads.index', compact('lists', 'list_gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $input['title'] = $request->title;
            Download::create($input);
            return redirect()->route('download.view')->with('message', 'Record added successfully');
        } catch (Exception $e) {
            return redirect()->route('download.view')->with('error', 'Enter value for category');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    public function g_downloads_store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'date' => 'required',
                'file' => 'required',
                'image' => 'required',
                'download_id' => 'required',
            ]);
            $input['title'] = $request->title;
            $input['date'] = Carbon::parse($request->date)->format('Y-m-d');
            $input['download_id'] = $request->download_id;
            if ($request->hasFile('file')) {
                $input['file'] = $request->file('file')->store('downloads', 'uploads');
            }
            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('downloads', 'uploads');
            }
            Download_gallery::create($input);
            return redirect()->route('download.view')->with('message', 'Record added successfully');

        } catch (Exception $e) {
            return redirect()->route('download.view')->with('error', 'Select category And fill form');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $list_gallery = Download_gallery::orderBy('id', 'DESC')->get();
        $lists = Download::orderBy('id', 'DESC')->get();
        $edit_record = Download::find($id);
        return view('admin.downloads.index', compact('lists', 'edit_record', 'list_gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $input['title'] = $request->title;
        $vals = Download::find($id);
        $vals->update($input);
        return redirect()->route('download.view')->with('message', 'Record added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Download::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->route('download.view')->with('message', 'Record added successfully');
        } else {

            return redirect()->route('download.view')->with('message', 'Please Check Child link');
        }
    }
    public function g_downloads_delete($id)
    {
        $delete = Download_gallery::find($id);
        unlink("uploads/" . $delete->file);
        unlink("uploads/" . $delete->image);
        $delete->delete();
        return redirect()->route('download.view')->with('message', 'Record added successfully');
    }

    public function g_downloads_edit(Request $request, $id)
    {

        $list_gallery = Download_gallery::orderBy('id', 'DESC')->get();
        $lists = Download::orderBy('id', 'DESC')->get();
        $edit_downloadGallery = Download_gallery::find($id);
        //  dd($edit_downloadGallery);
        return view('admin.downloads.index', compact('lists', 'edit_downloadGallery', 'list_gallery'));
    }
    public function g_downloads_update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'download_id' => 'required',
        ]);
        $update = Download_gallery::find($id);
        $input['title'] = $request->title;
        $input['date'] = $request->date;
        $input['download_id'] = $request->download_id;
        if ($request->hasFile('image')) {
            if (file_exists(public_path("uploads/" . $update->image))) {
                unlink("uploads/" . $update->image);
            }

            $input['image'] = $request->file('image')->store('downloads', 'uploads');
        }
        if ($request->hasFile('file')) {
            if (file_exists(public_path("uploads/" . $update->file))) {
                unlink("uploads/" . $update->file);
            }

            $input['file'] = $request->file('file')->store('downloads', 'uploads');
        }
        $update->update($input);
        return redirect()->route('download.view')->with('message', 'Record added successfully');
    }
}
