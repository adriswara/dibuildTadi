<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'production_price', 'selling_price'];
    public $timestamps = true;
}
