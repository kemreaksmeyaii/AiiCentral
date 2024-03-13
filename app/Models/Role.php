<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'isAdmin', 'description', 'maker', 'delby'
    ];

    protected $dates = ['deleted_at'];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permission');
    }
}
