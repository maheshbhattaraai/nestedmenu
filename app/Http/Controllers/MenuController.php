<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:50|min:3',
            'parent'=>'integer|exists:menus,id',
        ]);
        try{
            $menu  = new Menu;
            $menu->name = $request->name;
            $menu->parent  = $request->parent;
            $menu->save();
            return redirect()->back()->with('success', 'Menu Saved Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong! Please try later');
        }
    }

    public function index(){
        $menus = Menu::whereNull('parent')->get();
        $allMenus = Menu::pluck('name','id')->all();
        return view('nestedmenu',compact('menus','allMenus'));
    }

}
