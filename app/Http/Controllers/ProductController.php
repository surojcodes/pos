<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('pages.dashboard_pages.product.index',compact('products'));
    }
    public function create(){
        $categories = Productcategory::all();
        if($categories->count()==0){
            return back()->with('error','Create some product category first');
        }
        return view('pages.dashboard_pages.product.create',compact('categories'));
    }
    public function store(Request $req){
        $data=$req->validate([
            'name'=>'required|unique:products',
            'productcategory_id'=>'required',
        ]);
        $data['slug']=Str::slug($req->name);
        Product::create($data);
        return redirect('/products')->with('success','New product added!');
    }
    public function edit($slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product) abort(404);
        $categories = Productcategory::all();
        return view('pages.dashboard_pages.product.edit',compact('product','categories'));
    }
    public function update(Request $req,$slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product) abort(404);
        $data=$req->validate([
            'name'=>'required|unique:products',
            'productcategory_id'=>'required',
        ]);
        $data['slug']=Str::slug($req->name);
        $product->update($data);
        return redirect('/products')->with('success','Product updated!');
    }
    public function destroy($slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product) abort(404);
        $product->delete();
        return redirect('/products')->with('success','Product deleted!');
    }
}
