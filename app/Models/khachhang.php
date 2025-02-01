<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model implements Authenticatable
{
    use HasFactory;

    // Đặt tên bảng đúng
    protected $table = 'khach_hang'; // Đảm bảo bảng có tên đúng với cơ sở dữ liệu

    // Tắt tính năng timestamps mặc định của Laravel
    public $timestamps = false;

    // Các trường có thể được gán giá trị
    protected $fillable = ['ten_khach_hang', 'email', 'mat_khau', 'ngay_tao'];

    // Phương thức cần thiết để xác thực
    public function getAuthIdentifierName()
    {
        return 'id'; // Hoặc cột khóa chính của bạn nếu khác 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->mat_khau; // Cột chứa mật khẩu của khách hàng
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // Không cần xử lý nếu không sử dụng nhớ đăng nhập
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthPasswordName()
    {
        return 'mat_khau'; // Tên cột mật khẩu của bạn
    }
}
