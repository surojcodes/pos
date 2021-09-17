<?php

namespace App\Http\Controllers;

use App\Menucategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenucategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $menuCategories = Menucategory::orderBy('created_at','DESC')->get();
        return view('pages.dashboard_pages.menucategory.index',compact('menuCategories'));
    }
    public function create(){
        return view('pages.dashboard_pages.menucategory.create');
    }
    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required|unique:menucategories'
        ]);
        $data['slug'] = Str::slug($req->name);
        Menucategory::create($data);
        return redirect('/menucategories')->with('success','New menu category added!');
    }
    public function edit($slug){
        $menuCategory = Menucategory::where('slug',$slug)->first();
        return view('pages.dashboard_pages.menucategory.edit',compact('menuCategory'));
    }
    public function update(Request $req, $slug){
        $menucategory = Menucategory::where('slug',$slug)->first();
        if(!$menucategory){
            abort(404);
        }
        $data = $req->validate([
            'name'=>'required|unique:menucategories'
        ]);
        $data['slug'] = Str::slug($req->name);
        $menucategory->update($data);
        return redirect('/menucategories')->with('success','Menu category Updated!');
    }
    public function destroy($slug){
        $menucategory = Menucategory::where('slug',$slug)->first();
        if(!$menucategory){
            abort(404);
        }
        //TODO : delete all menu items and not let delete if already used
        $menucategory->delete();
        return redirect('/menucategories')->with('success','Menu category Deleted!');
    }
}
