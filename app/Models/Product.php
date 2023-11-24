<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const is_active = '0';
    const isactive = '1';
    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'img',
        'is_active',
        'describe',
    ];
}
