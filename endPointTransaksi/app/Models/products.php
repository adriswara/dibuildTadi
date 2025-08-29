<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'production_price', 'selling_price'];
    public $timestamps = true;
    
}
