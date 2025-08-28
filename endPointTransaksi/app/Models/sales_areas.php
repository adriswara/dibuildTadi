<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales_areas extends Model
{
    protected $table = 'sales_areas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name'];
    public $timestamps = true;
}
