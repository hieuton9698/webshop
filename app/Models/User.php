<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này

class User extends Authenticatable
{
    use HasFactory; 

    protected $table = 'tbl_admin'; 
 
    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_phone',
    ];


    public $timestamps = true;
}
