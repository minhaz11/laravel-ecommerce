<?php

namespace App;

use App\Customer;
use App\Shipping;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customers()
    {
       return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function shipping()
    {
       return $this->hasOne(Shipping::class,'id','shipping_id');
    }
}
