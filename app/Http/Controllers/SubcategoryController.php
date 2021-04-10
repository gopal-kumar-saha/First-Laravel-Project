<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Subcategory;

use Carbon\Carbon;

class SubcategoryController extends Controller
{
    function sub_category(){
        $categories = Category::all();
        return view('subcategory.index', compact('categories')); 
    }

    function subcategory_post (Request $request){
        // print_r($request->all());
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'created_at' => Carbon::now()
        ]);
        return back();
    }
}
