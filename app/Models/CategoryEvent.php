<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    use HasFactory;
    protected $fillable = ['name_kh', 'name_en', 'slug', 'description_kh', 'description_en', 'note', 'state'];

    public function event()
    {
        return $this->hasMany(Event::class, 'parent_category_id');
    }
}
