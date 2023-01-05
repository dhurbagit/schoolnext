<?php

namespace App\Providers;

use Session;
use App\Models\Menu;
use App\Models\User;
use App\Models\Setting;
use App\Models\ThemeOption;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFour();

        View::share('setting', Setting::first());
        View::share('themeOption', ThemeOption::first());

        //sharing session id
        view()->composer('*', function ($view)
        {
            $view->with('session_id', User::where('id', '=', session()->get('loginId'))->first() );
        });


        // main menu
        $menus = Menu::query()
            ->where(['parent_id' => null, 'publish_status' => 1])
            ->whereNotIn('header_footer', ['2','4', '5','6', '8', '9'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'position', 'title_slug')
            ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
            ->orderBy('position', 'ASC')
            ->get();
        View::share('menus', $menus);

        // footer menu
        $fmenus = Menu::where(['parent_id' => null, 'publish_status' => 1])->whereNotIn('header_footer', ['1', '4', '5', '6','7', '9'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'position', 'title_slug')
            ->orderBy('position', 'ASC')
            ->get();
        View::share('fmenus', $fmenus);
        // dd($fmenus);

        // mega menu
        $mega_menus = Menu::query()
        ->where(['parent_id' => null, 'publish_status' => 1])
        ->whereNotIn('header_footer', ['1','2','3','5','6','7','8', '9'])
        ->select('id', 'name', 'parent_id','banner_image', 'page_title', 'content' ,'external_link', 'category_slug', 'position', 'title_slug')
        ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
        ->orderBy('position', 'ASC')
        ->get();
        View::share('b_menus', $mega_menus);

        $top_ribbon = Menu::query()
        ->where(['parent_id' => null, 'publish_status' => 1])
        ->whereNotIn('header_footer', ['1','2','3','4', '6', '7'])
        ->select('id', 'name', 'parent_id', 'content' ,'external_link', 'category_slug', 'position', 'title_slug')
        ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
        ->orderBy('position', 'ASC')
        ->get();
        View::share('top_ribbon', $top_ribbon);


        $feature_link = Menu::query()
        ->where(['parent_id' => null, 'publish_status' => 1])
        ->whereNotIn('header_footer', ['1','2','3','4','5','8'])
        ->select('id', 'name', 'parent_id', 'content' ,'external_link', 'category_slug', 'position', 'title_slug')
        ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
        ->orderBy('position', 'ASC')
        ->get();
        View::share('feature_link', $feature_link);

    }
}
