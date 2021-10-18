<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoy extends Model {
    use HasFactory;
    protected $fillable = [
        'id',
        'laboratory_name',
        'lab_technician',
        'date_added'
    ];
}
