<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Category;  // pore bosa hoyse kintu

use App\Models\Product;  // pore bosa hoyse kintu

use App\Models\Featured_Photo;

use Carbon\Carbon;

use Image;

use Auth;

class ProductController extends Controller
{
    function product(){
        $categories = Category::all();
        $products = Product::where('user_id', Auth::id())->get();

        $soft_deleted_products =  Product::onlyTrashed('deleted_at')->get();

        return view('product.index', compact('categories','products','soft_deleted_products'));
    }





    function product_post(Request $request){

        // print_r($request->all());

        $random_product_photo_name = Str::random(10).time().".".$request->product_photo->getClientOriginalExtension();
        // $orginal_product_photo_name = $request->product_photo->getClientOriginalName();
        $product_photo =  $request->file('product_photo');
        Image::make($product_photo)->save(base_path('public/uploads/product_photos/').$random_product_photo_name);


        $product_id = Product::insertGetId($request->except('_token','product_photo','product_featured_photos') + [
            'product_photo' => $random_product_photo_name,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);




        
        foreach($request->file('product_featured_photos') as $single_featured_photo){

            $random_product_photo_name = Str::random(10).time().".".$single_featured_photo->getClientOriginalExtension();
            $product_photo =  $single_featured_photo;
            Image::make($product_photo)->save(base_path('public/uploads/featured_photos/').$random_product_photo_name);


            Featured_Photo::insert([
                'product_id' => $product_id,
                'featured_photo_name' => $random_product_photo_name,
                'created_at' => Carbon::now()
            ]);
        }

        return back();  
    }



    function edit_product($product_id){
        $categories = Category::all();
        $products = Product::findOrFail($product_id);
        return view('product.edit_product', compact('categories','products'));
    }




    function delete_product($product_id){
        // echo "$product_id";

        $data = Product::find($product_id); 
        $data->delete();

        return back();
    }
   

    function product_edit_post(Request $request, $product_id){
        
        
        // print_r($request->all());


        $category_id = $request->category_id;
        $product_id =  $request->product_id;
        $product_name =  $request->product_name;
        $product_price =  $request->product_price;
        $product_quantity =  $request->product_quantity;
        $product_short_description =  $request->product_short_description;
        $product_long_description =  $request->product_long_description;
        $product_quantity_alert =  $request->product_quantity_alert;

        $product_new_photo = $request->product_new_photo;

        if($product_new_photo){
            $old_product_photo = Product::find($product_id)->product_photo;
            $old_photo_path = base_path('public/uploads/product_photos/').$old_product_photo;
            unlink($old_photo_path);
            

            $random_product_new_photo_name = Str::random(10).time().".".$request->product_new_photo->getClientOriginalExtension();
            $product_photo =  $request->file('product_new_photo');
            Image::make($product_photo)->save(base_path('public/uploads/product_photos/').$random_product_new_photo_name);


            Product::findOrFail($product_id)->update([
                'category_id'=>$category_id,

                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_short_description' => $product_short_description,
                'product_long_description' => $product_long_description,
                'product_quantity_alert' => $product_quantity_alert,

                'product_photo' => $random_product_new_photo_name

                

            ]);

            return back();
        }

        else{
            Product::findOrFail($product_id)->update([
                'category_id'=>$category_id,

                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_short_description' => $product_short_description,
                'product_long_description' => $product_long_description,
                'product_quantity_alert' => $product_quantity_alert,
            ]);

            return back();
        }
       
    }







    function restore_product($product_id){
        // echo $product_id;

        Product::onlyTrashed()->where('id', $product_id)->restore();

        return back();
    }



    function force_delete_product($product_id){
        // echo $product_id;

        Product::onlyTrashed()->where('id', $product_id)->forceDelete();

        return back();
    }
}
