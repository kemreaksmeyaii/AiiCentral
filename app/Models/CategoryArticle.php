<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasFactory;
    protected $fillable = ['name_kh', 'name_en', 'slug', 'description_kh', 'description_en', 'note', 'state'];

    public function article()
    {
        return $this->hasMany(Article::class, 'parent_category_id')->where('state', 1)->where('schedule', '<=', date('Y-m-d'))->orderBy('id', 'ASC');
    }
    public function newsArticle()
    {
        return $this->hasMany(Article::class, 'parent_category_id')->where('state', 1)->where('schedule', '<=', date('Y-m-d'))->orderBy('id', 'DESC');
    }
}
