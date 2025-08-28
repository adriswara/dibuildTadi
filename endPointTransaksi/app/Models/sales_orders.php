<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales_orders extends Model
{
    protected $table = 'sales_orders';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['sales_id', 'customer_id', 'reference_no'];
    public $timestamps = true;
}
