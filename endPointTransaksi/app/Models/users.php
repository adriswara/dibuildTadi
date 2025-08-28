<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'phone', 'password', 'is_active', 'role_id'];
    public $timestamps = true;
}
