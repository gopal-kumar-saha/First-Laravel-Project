<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;  // pore bosa hoyse kintu

use App\Models\Product;  // pore bosa hoyse kintu

use Carbon\Carbon;

class ProductController extends Controller
{
    function product(){
        $categories = Category::all();
        $products = Product::all();

        $soft_deleted_products =  Product::onlyTrashed('deleted_at')->get();

        return view('product.index', compact('categories','products','soft_deleted_products'));
    }



    function product_post(Request $request){
        Product::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);
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
   

    function product_edit_post(Request $request){
        // print_r($request->all());

        $category_id = $request->category_id;

        $product_id =  $request->product_id;

        $product_name =  $request->product_name;
        $product_price =  $request->product_price;
        $product_quantity =  $request->product_quantity;
        $product_short_description =  $request->product_short_description;
        $product_long_description =  $request->product_long_description;
        $product_quantity_alert =  $request->product_quantity_alert;






        Product::findOrFail($product_id)->update([
                'category_id'=>$category_id,

                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_short_description' => $product_short_description,
                'product_long_description' => $product_long_description,
                'product_quantity_alert' => $product_quantity_alert
         ]);

         return back()->with('product_update_status', 'Product Updated Successfully');
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
