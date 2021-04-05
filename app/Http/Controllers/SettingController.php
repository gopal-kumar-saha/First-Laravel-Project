<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    function setting(){

        $settings = Setting::all();
        return view('setting.index', compact('settings'));
    }


    function setting_post(Request $request){

        $all_settings = $request->except('_token');

        foreach($all_settings as $key=>$value){
           Setting::where('setting_name', $key)->update([
               'setting_value'=>$value
           ]);
        }

        return back();
    }

    function login(){
        return view('setting.tohoney_login');
    }
}
