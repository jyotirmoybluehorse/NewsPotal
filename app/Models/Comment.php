<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $table = 'comments';

    function news() {
        return $this->belongsTo(News::class,'ref_news');
    }
}
