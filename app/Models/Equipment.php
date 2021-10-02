<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'lab_id',
        'is_active',
        'date_added'
    ];
}