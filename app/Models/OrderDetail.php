<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Product;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
