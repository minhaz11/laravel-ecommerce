<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    public function products()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
