<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViralDisease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'permanent'
    ];
}
