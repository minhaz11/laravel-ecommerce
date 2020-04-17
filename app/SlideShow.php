<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $guarded =[];
    public function products()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
