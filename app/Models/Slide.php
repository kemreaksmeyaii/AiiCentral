<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = ['thumbnail', 'title_kh', 'title_en', 'description_kh', 'description_en', 'link_slide', 'ordering', 'state'];
}
