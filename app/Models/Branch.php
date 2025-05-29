<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $primaryKey = 'BRANCHID'; // ✅ Chỉ định rõ khoá chính
    public $incrementing = false;       // ✅ Nếu BRANCHID không phải là auto-increment (tuỳ)
    protected $keyType = 'string';      // ✅ Hoặc 'int' nếu BRANCHID là số

    protected $fillable = [
        'BRANCHID',
        'LOCATION',
        'RENTBASE',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'BRANCHID');
    }
}