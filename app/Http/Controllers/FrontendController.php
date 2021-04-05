<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class FrontendController extends Controller
{

    function home(){
        $categories = Category::all();

        $products = Product::all();

        return view('index', compact('categories','products'));
    }

    function product_info($product_id){

        $product_category_id = Product::find($product_id)->category_id;

        $product_info = Product::find($product_id);

        $related_products = Product::where('category_id',$product_category_id)->where('id', '!=', $product_id)->get();

        
        
        $product_info = Product::findOrFail($product_id);
        $products = Product::all();

        return view('product.single_product', compact('product_info','products','related_products'));
    }

    function shop(){
        $categories = Category::all();
        $products = Product::inRandomOrder()->get(); 
        return view('shop', compact('products','categories'));
    }

    function categoriwise($category_id){

        $products = Product::where('category_id',$category_id)->get();

        // $product_name = Product::where('category_id',$category_id)->get();


        return view('category.categoriwiseshop', compact('products'));
    }
}
