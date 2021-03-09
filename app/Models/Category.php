<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;        //from soft delete documentation

class Category extends Model
{
    use HasFactory;
    use SoftDeletes; //from soft delete documentation

    protected $fillable = ['category_name'];
}
