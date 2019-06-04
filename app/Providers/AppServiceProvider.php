<?php

namespace App\Providers;

use App\Menu;
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
        $pages = [
            'template.pages.dashboard',
            'template.pages.master.general-setting',
            'template.pages.master.org',
        ];
        view()->composer($pages, function($view) {

            /** 
            * Get Parent Menu
            */
            $menuHeader = Menu::where('menu_parent', 0)
                               ->orderby('menu_group')
                               ->orderby('menu_sort')
                               ->get();
           $view->with('menuHeader', $menuHeader);
            /**
            * Get Child Menu
            */
            $menuChild = Menu::where('menu_parent', '!=', 0)
                               ->orderby('menu_group')
                               ->orderby('menu_sort')
                               ->get();

           $view->with('menuChild', $menuChild);
        });
    }
}
