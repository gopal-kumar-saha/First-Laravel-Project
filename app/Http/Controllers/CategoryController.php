<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;  // pore bosa hoyse kintu

use App\Models\Subcategory;  // pore bosa hoyse kintu

use App\Models\Product;

use Carbon\Carbon;

class CategoryController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }


    function category(){
        $categories = Category::all();

        $deleted_categories = Category::onlyTrashed()->get();

        return view('category.index', compact('categories','deleted_categories'));
    }




    function category_post(Request $request){
        
        // print_r($request->all());
        $request->validate([
            'category_name'=>'required|max:15|min:2|unique:categories,category_name'
        ],[
            'category_name.required'=>'Faka dewa jabe na !!!',
            'category_name.max'=>'15 tar beshi deso kno??? !!!',
            'category_name.min'=>'2 tar kom deso kno ???? !!!'
        ]);

        $category_name = $request->category_name;

        // echo $category_name;

        $category_id=Category::insertGetId([
            'category_name' => $category_name,
            'created_at' => Carbon::now()
        ]);

        Subcategory::insert([
            'category_id' => $category_id,
            'subcategory_name' => $request->subcategory_name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('category_insert_status', 'Category '.$category_name.' added successfully!');

    }



    function category_delete($category_id){

        if(Category::where('id', $category_id)->exists()){
            Category::find($category_id)->delete();
            Product::where('category_id', $category_id)->delete();
        }
        return back()->with('category_delete_status', 'Category deleted successfully!'); 

    }



    function category_all_delete(){


        // echo "thik ase";
        // Category::truncate();
        // echo Category::whereNull('deleted_at')->get();

        Category::whereNull('deleted_at')->delete();

        return back();

    }


    function category_edit($category_id){

        $category_info = Category::find($category_id);

        return view('category/edit', compact('category_info'));
    }




    function category_edit_post(Request $request){

        $new_name =  $request->category_name;
        $old_name  = Category::find($request->category_id)->category_name;

       if ($new_name == $old_name) {
           return back()->withErrors('Same deso kn?');
       }
        

        

         $request->validate([
            'category_name'=>'required|max:10|min:5|unique:categories,category_name'
        ],[
            'category_name.required'=>'Faka dewa jabe na !!!',
            'category_name.max'=>'10 tar beshi deso kno??? !!!',
            'category_name.min'=>'5 tar kom deso kno ???? !!!'
        ]);



        // $new_name = $request->category_name;   ata age declear korsi 

        $category_id = $request->category_id;

        $data = Category::find($category_id);
        $data->update([
            'category_name' => $new_name,
            'created_at' => Carbon::now()
        ]);
        
        return back();
    }









    function category_restore($category_id){

        Category::onlyTrashed()->where('id', $category_id)->restore();

        return back();
    }



    function category_force_delete($category_id){

        Category::onlyTrashed()->where('id', $category_id)->forceDelete();

        return back();
    }



    

    function category_check_delete(Request $request){

        // print_r($request->check_query_id);

        if(isset($request->check_category_id)){
            foreach($request->check_category_id as $check_category){
                 Category::find($check_category)->delete();
            }
            return back();
        }
        else{
            echo "kichu checked koro nai kno";
        }
    }

}
