<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $brands = Brand::orderBy('name')->get();
        $productList = Product::has('brand')->get(); //Select * From products;
        return view('product/list',['list' => $productList,
        'brands'=> $brands]);
    }

    function form($id = null){
        $product = new Product();
        $brands = Brand::orderBy('name')->get();
        if($id != null){
            $product = Product::findOrFail($id);
        }
        return view('product/form', ['product' => $product , 'brands' => $brands]);
    }

    function delete($id){
        //Product::destroy($id);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('message', 'El producto fue borrado');
    }

    

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand' => 'required|max:50'
        ]);
        $product = new Product();
        $message = 'Se ha creado un producto nuevo';
        if(intval($request->id)>0){
            $product = Product::findOrFail($request->id);
            $message = 'Se ha editado un producto';
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;

        $product->save();
        return redirect('/products')->with('successMessage',$message);
    }
}
