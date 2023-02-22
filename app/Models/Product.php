<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'feature_image_name', 'feature_image_path', 'user_id', 'category_id', 'content'];
    public function images(){
        return $this->hasMany(ProductImage::class, 'parent_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps();
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
