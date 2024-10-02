<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'screen_size',
        'color',
        'harddisk',
        'cpu',
        'ram',
        'OS',
        'special_features',
        'graphics',
        'graphics_coprocessor',
        'cpu_speed',
        'rating', 
        'price',
    ];
}
