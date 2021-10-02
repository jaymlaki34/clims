<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model {
    use HasFactory;
    protected $fillable = [
        'id',
        'category_name',
        'is_active'
    ];
}