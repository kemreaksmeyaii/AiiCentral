<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_kh', 
        'name_en',
        'title_kh',
        'title_en', 
        'slug', 
        'feature', 
        'parent_category_id', 
        'description_kh', 
        'description_en',
        'photo', 
        'state'];

    public function category()
    {
        return $this->belongsTo(CategoryAlumni::class, 'parent_category_id');
    }
}
