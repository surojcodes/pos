<?php

namespace App\Http\Controllers;

use App\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDO;

class ProductcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $productCategories = Productcategory::orderBy('created_at','DESC')->get();
        return view('pages.dashboard_pages.productcategory.index',compact('productCategories'));
    }
    public function create(){
        return view('pages.dashboard_pages.productcategory.create');
    }
    public function store(Request $req){
        $data = $req->validate([
            'name'=>'required|unique:productcategories'
        ]);
        $data['slug'] = Str::slug($req->name);
        Productcategory::create($data);
        return redirect('/productcategories')->with('success','New product category added!');
    }
    public function edit($slug){
        $productCategory = Productcategory::where('slug',$slug)->first();
        return view('pages.dashboard_pages.productcategory.edit',compact('productCategory'));
    }
    public function update(Request $req, $slug){
        $productCategory = Productcategory::where('slug',$slug)->first();
        if(!$productCategory){
            abort(404);
        }
        $data = $req->validate([
            'name'=>'required|unique:productcategories'
        ]);
        $data['slug'] = Str::slug($req->name);
        $productCategory->update($data);
        return redirect('/productcategories')->with('success','Product category Updated!');
    }
    public function destroy($slug){
        $productCategory = Productcategory::where('slug',$slug)->first();
        if(!$productCategory){
            abort(404);
        }
        $products  = $productCategory->products;
        foreach($products as $product){
            $product->delete();
        }
        //TODO : not let delete if already used
        $productCategory->delete();
        return redirect('/productcategories')->with('success','Product category Deleted!');
    }
}
