<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Menucategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $menus = Menu::orderBy('created_at','DESC')->get();
        return view('pages.dashboard_pages.menu.index',compact('menus'));
    }
    public function create(){
        $categories = Menucategory::all();
        if($categories->count()==0){
            return back()->with('error','Create some menu category first');
        }
        return view('pages.dashboard_pages.menu.create',compact('categories'));
    }
    public function store(Request $req){
        $data=$req->validate([
            'name'=>'required|unique:menus',
            'menucategory_id'=>'required',
            'price'=>'required'
        ]);
        $data['slug']=Str::slug($req->name);
        Menu::create($data);
        return redirect('/menus')->with('success','New menu item added!');
    }
    public function edit($slug){
        $menu = Menu::where('slug',$slug)->first();
        if(!$menu) abort(404);
        $categories = Menucategory::all();
        return view('pages.dashboard_pages.menu.edit',compact('menu','categories'));
    }
    public function update(Request $req,$slug){
        $menu = Menu::where('slug',$slug)->first();
        if(!$menu) abort(404);
        $data=$req->validate([
            'name'=>'required|unique:menus',
            'menucategory_id'=>'required',
            'price'=>'required'
        ]);
        $data['slug']=Str::slug($req->name);
        $menu->update($data);
        return redirect('/menus')->with('success','Menu item updated!');
    }
    public function destroy($slug){
        $menu = Menu::where('slug',$slug)->first();
        if(!$menu) abort(404);
        $menu->delete();
        return redirect('/menus')->with('success','Menu item deleted!');
    }
}
