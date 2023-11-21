<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    const one = '1';
    const two = '2';
    protected $fillable = [
        'name',
        'brand',
        'img',
        'is_active',
        'describe',
    ];
}
