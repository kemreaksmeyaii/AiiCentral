<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAlumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_kh', 
        'name_en', 
        'slug', 
        'description_kh', 
        'description_en', 
        'note', 
        'state'];

    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'parent_category_id');
    }
}
