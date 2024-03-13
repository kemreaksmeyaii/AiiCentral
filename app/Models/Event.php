<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title_kh', 'title_en', 'slug', 'feature', 'date_kh', 'date_en', 'start_date', 'end_date', 'parent_category_id', 'description_kh', 'description_en', 'state'];

    public function category()
    {
        return $this->belongsTo(CategoryEvent::class, 'parent_category_id');
    }
}
