<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcategory;
use App\Purchase;
use Illuminate\Http\Request;
use Nilambar\NepaliDate\NepaliDate;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $purchases = Purchase::orderBy('purchase_date','DESC')->get();
        return view('pages.dashboard_pages.purchase.index',compact('purchases'));
    }
    public function create(){
        $categories = Productcategory::all();
        if(!Product::count()){
            return back()->with('error','Create a product first.');
        }
        return view('pages.dashboard_pages.purchase.create',compact('categories'));
    }
    public function store(Request $req){
        $data=$req->validate([
            'product_id'=>'required',
            'unit'=>'required',
            'unit_cost'=>'required',
            'total_cost'=>'required',
        ]);
        $data['remarks']=$req->remarks;
        $data['purchase_date_nepali'] = request('purchase_date');
        $obj = new NepaliDate();
        $purchase_date_nepali_arr = explode('-',request('purchase_date'));
        $purchase_date = $obj->convertBsToAd($purchase_date_nepali_arr[0],$purchase_date_nepali_arr[1],$purchase_date_nepali_arr[2]);
        $purchase_date = date_create($purchase_date['year'].'-'.$purchase_date['month'].'-'.$purchase_date['day']);
        $data['purchase_date'] = $purchase_date;
        $data['slug'] = 'purchase-'.$data['product_id'].'-'.now();
        Purchase::create($data);
        return redirect('/purchases')->with('success','New purchase added!');
    }

    public function edit($slug){
        $purchase = Purchase::where('slug',$slug)->first();
        if(!$purchase) abort(404);
        $categories = Productcategory::all();
        $products = $purchase->product->productcategory->products;
        return view('pages.dashboard_pages.purchase.edit',compact('purchase','categories','products'));
    }

    public function update(Request $req,$slug){
        $purchase = Purchase::where('slug',$slug)->first();
        if(!$purchase) abort(404);
        $data=$req->validate([
            'product_id'=>'required',
            'unit'=>'required',
            'unit_cost'=>'required',
            'total_cost'=>'required',
        ]);
        $data['remarks']=$req->remarks;
        $data['purchase_date_nepali'] = request('purchase_date');
        $obj = new NepaliDate();
        $purchase_date_nepali_arr = explode('-',request('purchase_date'));
        $purchase_date = $obj->convertBsToAd($purchase_date_nepali_arr[0],$purchase_date_nepali_arr[1],$purchase_date_nepali_arr[2]);
        $purchase_date = date_create($purchase_date['year'].'-'.$purchase_date['month'].'-'.$purchase_date['day']);
        $data['purchase_date'] = $purchase_date;
        $data['slug'] = 'purchase-'.$data['product_id'].'-'.now();
        $purchase->update($data);
        return redirect('/purchases')->with('success','Purchase updated!');
    }
    public function destroy($slug){
        $purchase = Purchase::where('slug',$slug)->first();
        if(!$purchase) abort(404);
        $purchase->delete();
        return redirect('/purchases')->with('success','Purchase deleted!');
    }
}
