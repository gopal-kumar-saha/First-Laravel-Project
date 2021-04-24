<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

// use Illuminate\Foundation\Auth\Customer;

use App\Models\Category;

use App\Models\Product;

use App\Models\Customer;

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
        return view('category.categoriwiseshop', compact('products'));
    }

    function customer_register(){
        return view('customer.register');
    }

    function customer_register_post(Request $request){
        if(Customer::where('email',$request->email)->exists()){
            return back()->with('cus_email_err','This email already have exits');
        }
        else{
            Customer::insert($request->except('_token','con_pass','password')+[
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now()
            ]);
        } 
        return back()->with('res_success_msg','Registration Success...');
    }

    function customer_login(){
        return view('customer.login');
    }

    function customer_login_post(Request $request){
        
        if(Customer::where('email',$request->email)->exists()){
            $db_pass = Customer::where('email',$request->email)->first()->password;
            $pass = $request->password;
            if(Hash::check($pass,$db_pass)){
                return view('customer.dashboard');


                // if(Auth::attempt($request->except('_token'))){
                //     return redirect()->intended('home');
                // }
            }
            else{
                return back()->with('login_err_msg','username or password is not match');
            }
        }
        else{
            return back()->with('login_err_msg','Email is not found !!!');
        }
    }
}
