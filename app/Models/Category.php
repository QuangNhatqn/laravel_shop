<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
//    protected $fillable = ['name', 'parent_id', 'slug'];
    protected $guarded = [];

    function categoryChilds(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
