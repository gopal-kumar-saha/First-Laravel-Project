<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use Carbon\Carbon;

class CartController extends Controller
{
    function add_to_cart(Request $request, $product_id){
        if(Cart::where('product_id',$product_id)->where('ip_address',request()->ip())->exists()){
            Cart::where('product_id',$product_id)->where('ip_address',request()->ip())->increment('product_quantity',$request->quantity);
        }
        else{
            Cart::insert([
            'product_id' => $product_id,
            'product_quantity' => $request->quantity,
            'ip_address' => request()->ip(),
            'created_at' => Carbon::now()
            ]);
        }
        return back();       
    }
}