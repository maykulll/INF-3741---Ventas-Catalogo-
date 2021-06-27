<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'product',
        'prize',
        'imageurl',
        'brand',
        'type_id',
        'colour_id'
    ];
}
