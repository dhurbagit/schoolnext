<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function view()
    {
        $list = Blog::orderBy('id', 'DESC')->where('type', 10)->get();
        $update = Blog::where('type', 5)->orderBy('id', 'DESC')->first();
        return view('admin.blogs.index', compact('list', 'update'));
    }

    public function view_form()
    {
        return view('admin.blogs.form');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $blogContenId = 10;
        $request->validate([
            'title' => 'required',
            'designation' => 'required',
            'date' => 'required',
            'inner_description' => 'required',
            'image' => 'required',
        ]);
        $input['title'] = $request->title;
        $input['designation'] = $request->designation;
        $input['date'] = $request->date;
        $input['type'] = $blogContenId;
        $input['inner_description'] = $request->inner_description;
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('blogs', 'uploads');
        }
        Blog::create($input);

        // automatic remove image from folder by checking in database table
        $scan = scandir(public_path('ckimages_blog'));
        $files = DB::table('blogs')->pluck('inner_description');

        $items = array();
        foreach ($files as $haystack) {
            if (Preg_match_all('@src="([^"]+)"@', $haystack, $matches)) {
                array_push($items, $matches[1]);
            }
        }

        $img_name = array();
        foreach ($items as $rec) {
            foreach ($rec as $dats) {
                $link_array = explode('/', $dats);
                $page = end($link_array);
                array_push($img_name, $page);
            }
        }

        $protectTheseImages = [];
        foreach ($img_name as $file) {
            $protectTheseImages[] = $file;
        }

        $diff = array_diff($scan, $protectTheseImages);
        foreach ($diff as $file) {
            if (!is_dir($file)) {
                unlink("ckimages_blog/" . $file);
            }
        }

        return redirect()->back()->with('message', 'Record added successfully!');
    }
    public function delete($id)
    {
        $delete = Blog::find($id);
        unlink('uploads/' . $delete->image);
        $delete->delete();
        return redirect()->back()->with('message', 'Record Deleted successfully!');
    }
    public function edit($id)
    {
        $records = Blog::find($id);
        return view('admin.blogs.form', compact('records'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'designation' => 'required',
            'date' => 'required',
            'inner_description' => 'required',
        ]);
        $update = Blog::find($id);
        $input['title'] = $request->title;
        $input['designation'] = $request->designation;
        $input['date'] = $request->date;
        $input['inner_description'] = $request->inner_description;
        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploads/' . $update->image))) {
                unlink('uploads/' . $update->image);
            }
            $input['image'] = $request->file('image')->store('blogs', 'uploads');
        }
        $update->update($input);

        // automatic remove image from folder by checking in database table
        $scan = scandir(public_path('ckimages_blog'));
        $files = DB::table('blogs')->pluck('inner_description');

        $items = array();
        foreach ($files as $haystack) {
            if (Preg_match_all('@src="([^"]+)"@', $haystack, $matches)) {
                array_push($items, $matches[1]);
            }
        }

        $img_name = array();
        foreach ($items as $rec) {
            foreach ($rec as $dats) {
                $link_array = explode('/', $dats);
                $page = end($link_array);
                array_push($img_name, $page);
            }
        }

        $protectTheseImages = [];
        foreach ($img_name as $file) {
            $protectTheseImages[] = $file;
        }

        $diff = array_diff($scan, $protectTheseImages);
        foreach ($diff as $file) {
            if (!is_dir($file)) {
                unlink("ckimages_blog/" . $file);
            }
        }

        return redirect()->back()->with('message', 'Record added successfully!');

    }
    public function save(Request $request)
    {
        $blogContenId = '5';
        $request->validate([
            'page_title' => 'required',
            'page_description' => 'required',

        ]);
        $input['page_title'] = $request->page_title;
        $input['page_description'] = $request->page_description;
        $input['type'] = $blogContenId;
        Blog::create($input);
        return redirect()->back()->with('message', 'Record added successfully!');
    }

    public function blog_title_update(Request $request, $id)
    {
        $blogContenId = '5';
        $request->validate([
            'page_title' => 'required',
            'page_description' => 'required',
        ]);
        $update = Blog::where('type', 5)->find($id);
        $input['page_title'] = $request->page_title;
        $input['page_description'] = $request->page_description;
        $input['type'] = $blogContenId;
        $update->update($input);
        return redirect()->back()->with('message', 'Record Updated successfully!');
    }

    public function show_detail($id)
    {
        $single_detail = Blog::find($id);
        return view('frontend.blogs.detail', compact('single_detail'));
    }
}
