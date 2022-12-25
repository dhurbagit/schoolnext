<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    protected $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }


    public function index()
    {
        $menu_items = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['2', '4', '5', '6', '8', '9'])->get();
        $menu_footer = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['1', '4', '5', '6','7', '9'])->get();

        $mega_menus = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['1','2','3','5','6','7','8', '9'])->get();
        $top_header_ribbon = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['1','2','3','4', '6', '7'])->get();
        $feature_link = Menu::orderBy('position', 'asc')->whereNotIn('header_footer', ['1','2','3','4','5','8'])->get();

        $menu_s = Menu::get();
        return view('admin.menu.index', compact('menu_items', 'menu_footer', 'menu_s','mega_menus', 'top_header_ribbon', 'feature_link'));
    }
    public function view()
    {
        // $menu_category = Menu::contentTy
        $menu_categories = Menu::contentType;
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('admin.menu.create', compact('menu_categories', 'parent_menus'));
    }
    public function edit($id){
            $edit_menu = Menu::findOrFail($id);
            $menu_categories = Menu::contentType;
            $parent_menus = Menu::where('parent_id', null)->get();
            return view('admin.menu.edit', compact('edit_menu', 'menu_categories','parent_menus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'page_title' => 'nullable|max:250',
            'menu_category' => 'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => 'required|max:250',
            'banner_image' => 'mimes:jpg,png,jpeg',
        ]);
        // return $request->all();
        $menu_count = Menu::count();
        $parent_id = NULL;
        $show_in = 1;
        if ($request['main_child'] == 1) {
            $parent_id = $request['parent_id'];
        }
        elseif($request['main_child'] == 0){
            $show_in = $request['show_in'];
        }
        $fimage = null;
        if($request->hasFile('image')){
            $image =  $request->file('image');
            $fimage = $image->store('main_images', 'uploads');
        }
        $banner_image = null;
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $banner_image = $image->store('menu_images', 'uploads');
        }

        $new_menu = Menu::create([
            'name' => $request['name'],
            'position' => $menu_count + 1,
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $banner_image,
            'image' => $fimage,
            'title_slug'=>Str::slug($request->page_title.rand(0,10)),
            'publish_status'=>isset($request->publish_status[0]) ? 1 : 0,
            'mega_menu' =>isset($request->active_mega[0]) ? 1 : 0,
            'page_title' => $request['page_title'],
            'content' => $request['editor1'],
        ]);

        if($new_menu)
        return redirect()->back()->with('message', 'Menu information is saved successfully.');
        else
        return redirect()->back()->with('error', 'Somthing went wrong');
    }

    public function updateMenuOrder(Request $request)
    {

        parse_str($request->sort, $arr);
        $order = 1;

        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
                $this->menu->where('id', $key)
                    ->update([
                        'position' => $order,
                        'parent_id' => ($value == "null") ? NULL : $value,
                        'main_child' => ($value == "null") ? 0 : 1,
                    ]);
                $order++;
            }
        }
        return true;
    }

    public function delete($id)
    {
        $delete_menu = Menu::findOrFail($id);
        $meg =  $delete_menu->delete();
        if($meg){
            return redirect()->back()->with('message', 'Menu deleted successfully!');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong !');
        }
    }
    public function update(Request $request , $id){
        //  dd($request->all());
         $menu = Menu::findorFail($id);
         $this->validate($request, [
             'name'    => 'required',
             'menu_category' => 'required',
             'main_child' => 'required',
             'parent_id' => '',
             'show_in' => '',
         ]);

         $parent_id = NULL;
         $show_in = 1;
         if($request['main_child'] == 1)
         {
             $parent_id = $request['parent_id'];
         }
         else if($request['main_child'] == 0)
         {
             $show_in = $request['show_in'];
         }

         $fimage = null;
         if($request->hasfile('image'))
         {
            if(!empty($menu->image)){
                unlink("uploads/" . $menu->image);
            }
             $image = $request->file('image');
             $fimage = $image->store('main_images', 'uploads');
         }else{
             $fimage = $menu->image;
         }

         $banner_image = null;
         if($request->hasfile('banner_image'))
         {
            if(!empty($menu->image)){
                unlink("uploads/" . $menu->banner_image);
            }
             $image = $request->file('banner_image');
             $banner_image = $image->store('menu_images', 'uploads');
         }else{
             $banner_image = $menu->banner_image;
         }

        //  dd('this');

         $menu->update([
             'name' => $request['name'],
             'category_slug' => $request['menu_category'],
             'main_child' => $request['main_child'],
             'parent_id' => $parent_id,
             'external_link' => $request['external_link'],
             'header_footer' => $show_in,
             'banner_image' => $banner_image,
             'image' => $fimage,
             'title_slug'=>str::slug($request->page_title.rand(0,10)),
             'page_title' => $request['page_title'],
             'content' => $request['editor1'],
             'meta_title' => $request['meta_title'],
             'publish_status'=>isset($request->publish_status[0]) ? 1 : 0,
             'mega_menu' =>isset($request->active_mega[0]) ? 1 : 0,

         ]);

         return redirect()->back()->with('message', 'Menu information is updated successfully.');
    }

}
