<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales_order_item extends Model
{
    protected $table = 'sales_order_item';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['quantity', 'production_price', 'selling_price', 'product_id', 'order_id'];
}
