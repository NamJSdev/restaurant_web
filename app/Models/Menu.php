<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'DISHID',
        'BRANCHID',
        'CREATED_AT',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'BRANCHID');
    }
    public function dish()
    {
        return $this->belongsTo(Dish::class, 'DISHID');
    }
}