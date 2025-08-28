<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name','address','phone'];
    public $timestamps = true;
}
