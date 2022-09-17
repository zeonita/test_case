<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function detail()
    {
        return $this->hasOne(ProductDetail::class)->orderByDesc('created_at');
    }
}
