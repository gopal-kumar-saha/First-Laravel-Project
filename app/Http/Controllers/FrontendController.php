<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

// use Illuminate\Foundation\Auth\Customer;

use App\Models\Category;

use App\Models\Product;

use App\Models\Customer;

use App\Models\User;

use App\Models\City;

use App\Models\Cartorder;

use App\Models\Cart;

use App\Models\Order_Details;

use Carbon\Carbon;

use Hash;

use Auth;

class FrontendController extends Controller
{

    function home(){
        $categories = Category::all();

        $products = Product::all();

        return view('index', compact('categories','products'));
    }

    function product_info($product_id){

        $product_category_id = Product::findOrFail($product_id)->category_id;

        $product_info = Product::findOrFail($product_id);

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
        return view('category.categoriwiseshop', compact('products'));
    }

    function customer_register(){
        return view('customer.register');
    }

    function customer_register_post(Request $request){
        // if(Customer::where('email',$request->email)->exists()){
        //     return back()->with('cus_email_err','This email already have exits');
        // }
        // else{
        //     Customer::insert($request->except('_token','con_pass','password')+[
        //         'password' => bcrypt($request->password),
        //         'created_at' => Carbon::now()
        //     ]);
        // } 

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 2,
            'created_at' => Carbon::now()
        ]);
        return back()->with('res_success_msg','Registration Success...');
    }

    function customer_login(){
        return view('customer.login');
    }

    function customer_login_post(Request $request){
        
        if(User::where('email',$request->email)->exists()){
            $customer_info = User::where('email',$request->email)->first();

             $db_pass = User::where('email',$request->email)->first()->password;
            
             $pass = $request->password;

            
            if(Hash::check($pass,$db_pass)){
                // return view('customer.dashboard');
                // return view('layouts.starlight');
                // return redirect()->intended('home');


                if(Auth::attempt($request->except('_token'))){
                    return redirect()->intended('home');
                }
            }
            else{
                return back()->with('login_err_msg','username or password is not match');
            }
        }
        else{
            return back()->with('login_err_msg','Email is not found !!!');
        }
    }


    function get_city_list(Request $request){
        // echo "hello";
        // echo $request->country_id;
        $cities = City::where('country_id', $request->country_id)->select('id','name')->get();
        $str_to_send = "";
        foreach($cities as $city){
            $str_to_send = $str_to_send."<option value='".$city->id."'> $city->name </option>";
        }
        echo $str_to_send;
    }


    function checkout_post (Request $request){
        // dd($request->all());

        if($request->payment_option == 1){
            return redirect('online/payment');
        }
        else{
           $order_id = Cartorder::insertGetId($request->except('_token')+[
                'user_id' => Auth::id(),
                'payment_status' => 1,
                'discount' => session('discount'),
                'sub_total' => session('subtotal'),
                'total' => session('total'),
                'created_at' => Carbon::now()
            ]);
            
            $carts = Cart::where('ip_address', request()->ip())->select('id','product_id','product_quantity')->get();

            foreach($carts as $cart){
                Order_Details::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->product_quantity,
                    'created_at' => Carbon::now()
                ]);

                Product::find($cart->product_id)->decrement('product_quantity',$cart->product_quantity);
                Cart::find($cart->id)->delete();
            }

            return back();
        }
    }
}
