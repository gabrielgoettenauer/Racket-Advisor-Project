<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'material_face',
        'price',
        'eva',
        'weight',
        'thickness_mm',
        'balance',
        'level',
        'style',
        'is_comfortable',
        'power_control',
        'injury_indicated',
        'description',
    ];
}
