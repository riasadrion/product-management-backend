<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
