<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected $table = 'categories';

    function news() {
        return $this->hasMany(News::class,'ref_category');
    }
}
