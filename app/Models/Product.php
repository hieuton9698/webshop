<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_products'; // Tên bảng trong database
    protected $primaryKey = 'products_id'; // Khóa chính của bảng

    protected $fillable = [
        'products_name',
        'products_quantity',
        'products_content',
        'products_price',
        'products_image',
        'products_status',
        'category_id', // Nếu bạn muốn liên kết với danh mục
    ];

    // Quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Sử dụng 'category_id' làm khóa ngoại
    }
}
