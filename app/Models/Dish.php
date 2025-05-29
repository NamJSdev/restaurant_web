<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dish';
    protected $primaryKey = 'DISHID'; // ✅ Thêm dòng này
    public $incrementing = false;     // Nếu không phải auto-increment
    protected $keyType = 'string';    // Hoặc 'int' tùy theo kiểu dữ liệu thực tế

    protected $fillable = [
        'DISHID',
        'DISHNAME',
        'DISHDESCRIPTION',
        'INGREDIENT',
        'BASEPRICE',
        'DISHIMAGE',
        'MANAGERID',
        'BRANCHID',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'DISHID');
    }
}