<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Subcategory;

use Carbon\Carbon;

class SubcategoryController extends Controller
{
    function sub_category(){
        return view('subcategory.index');
    }
}
