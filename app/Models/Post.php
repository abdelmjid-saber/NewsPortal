<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable ;


    public function rSubCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function toSearchableArray()
    {
        return [
            'post_title' => $this->post_title,
        ];
    }
}
