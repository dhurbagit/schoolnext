<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();

        View::share('setting', Setting::first());
        $mega_menus = Menu::query()
        ->where(['parent_id' => null, 'publish_status' => 1])
        ->whereNotIn('header_footer', ['1','3','2'])
        ->select('id', 'name', 'parent_id', 'content' ,'external_link', 'category_slug', 'position', 'title_slug')
        ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
        ->orderBy('position', 'ASC')
        ->get();
        View::share('b_menus', $mega_menus);


        $menus = Menu::query()
            ->where(['parent_id' => null, 'publish_status' => 1])
            ->whereNotIn('header_footer', ['2','4'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'position', 'title_slug')
            ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
            ->orderBy('position', 'ASC')
            ->get();
        View::share('menus', $menus);



        $fmenus = Menu::where(['parent_id' => null, 'publish_status' => 1])->whereNotIn('header_footer', ['1','4'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'position', 'title_slug')
            ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
            ->orderBy('position', 'ASC')
            ->take(4)
            ->get();
        View::share('fmenus', $fmenus);
    }
}
