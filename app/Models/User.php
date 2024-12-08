<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'users'; // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'user_id'; // Khóa chính của bảng

    protected $fillable = ['user_name', 'address', 'phone_number', 'email', 'password','role']; // Các trường có thể được gán

    protected $hidden = ['password']; // Các trường sẽ bị ẩn khi truy vấn dữ liệu

    // Các phương thức, quan hệ với các model khác có thể được định nghĩa ở đây
}