<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Contact;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendMesseges;

class ContactController extends Controller
{
    //

    function contact(){
        return view('contact');
    }

    function contact_info(Request $request){
        // print_r($request->all());

        Contact::insert($request->except('_token'));
        return back()->with('contact_send_status','Messege Send Successfully');
    }

    function contact_mail(Request $request){
        Mail::to('dipu.ewu.cse@gmail.com')->send(new SendMesseges($request->msg));
        return back();
    }

}
