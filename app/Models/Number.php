<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $fillable = [
        'n1',
        'name1',
        'n2',
        'name2',
        'n3',
        'name3',
        'n4',
        'name4',
    ];
}
