<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales_targets extends Model
{
    protected $table = 'sales_targets';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['active_date', 'amount', 'sales_id'];
    public $timestamps = true;
}
