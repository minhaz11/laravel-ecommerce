<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];



   public function category(){
     return $this->hasOne(Category::class);
    }
}





