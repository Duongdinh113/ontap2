<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    const is_active = '0';
    const isactive = '1';
    protected $fillable = [
        'name',
        'serial',
        'model',
        'img',
        'is_active',
        'describe',
    ];
}
