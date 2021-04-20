<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use App\Models\Product;

use App\Models\Coupon;

use Carbon\Carbon;

class CartController extends Controller
{
    function add_to_cart(Request $request, $product_id){

        $oder_quantity = $request->quantity;
        $database_quantity = Product::find($product_id)->product_quantity;

        if($oder_quantity>$database_quantity){
            return back()->with('error', 'stock not available !');
        }

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

    function cart_delete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cart_details($coupon_name=''){
        if($coupon_name == ''){
            $discount_amount = 0;
            $carts = Cart::all();
            return view('cart.index', compact('carts','discount_amount','coupon_name'));
        }
        else{
            if(Coupon::where('coupon_name', $coupon_name)->exists()){
                $today_date = Carbon::now()->format('Y-m-d');
                $coupon_date = Coupon::where('coupon_name', $coupon_name)->first()->expired_date;

                if($today_date < $coupon_date){                   
                    $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                    $carts = Cart::all();
                    return view('cart.index', compact('carts','discount_amount','coupon_name'));
                }
                else{
                    // echo "expired hoye gesa";
                    return back()->with('date_error','expired hoye gesa');
                }
            }
            else{
                // echo "Invalid coupon name";
                return back()->with('coupon_error','Invalid coupon name');
            }
        }

        // die();
        // $carts = Cart::all();
        // return view('cart.index', compact('carts'));
    }



    function cart_update(Request $request){
        // dd($request);
        foreach($request->quantity as $cart_id => $quantity){
            Cart::find($cart_id)->update([
                'product_quantity' => $quantity
            ]);
        }
        return back();
    }





    function check_out(){
        return view('checkout.index');
    }
}