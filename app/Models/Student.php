<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    const is_active = '1';
    const is_not_active = '0';

    protected $fillable = [
        'name',
        'code',
        'date_of_birth',
        'img',
        'is_active',
    ];
}
