<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    protected $table = 'news';

    public function refCategory() {
        return $this->belongsTo(Category::class,'ref_category');
    }
    public function refComment() {
        return $this->hasMany(Comment::class,'ref_news');
    }
}
