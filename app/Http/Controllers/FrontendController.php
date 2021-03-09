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


    function contact(){

        return view('contact');
    }

    function product_info(){
        echo "ok";
    }
}
