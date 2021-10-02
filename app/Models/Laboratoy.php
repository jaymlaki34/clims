<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoy extends Model {
    use HasFactory;
    protected $fillable = [
        'id',
        'laboratory_name',
        'date_added'
    ];
}