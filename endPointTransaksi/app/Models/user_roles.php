<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name'];
    public $timestamps = true;
}
