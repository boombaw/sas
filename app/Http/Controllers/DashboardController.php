<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
    	/**
    	* Get Parent Menu
    	*/
    	$menuHeader = Menu::where('menu_parent', 0)
    					   ->orderby('menu_group')
    					   ->orderby('menu_sort')
    					   ->get();
    	/**
    	* Get Child Menu
    	*/
    	$menuChild = Menu::where('menu_parent', '!=', 0)
					       ->orderby('menu_group')
    					   ->orderby('menu_sort')
    					   ->get();

    	return view('template.pages.dashboard', compact('menuHeader','menuChild'));
    }
}
