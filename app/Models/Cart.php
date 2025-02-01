<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product; 
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'products_name',
        'products_image',
        'quantity',
        'price',
        'category_id', // Thêm cột category_id
        'size',        // Thêm cột size
    ];

    // Khai báo khóa chính là cột 'id'
    protected $primaryKey = 'id';

    // Quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    // Quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
