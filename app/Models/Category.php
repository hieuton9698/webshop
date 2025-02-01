<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['products_name'];

    // Mối quan hệ với Product (một danh mục có nhiều sản phẩm)
    public function category()
{
    return $this->belongsTo(Category::class);
}

    
}
