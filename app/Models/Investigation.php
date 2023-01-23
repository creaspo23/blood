<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'status',
        'type',
        'unit',
        'diagnosis'
    ];

    public function person () {
        return $this->belongsTo(Person::class);
    }

    public function tests () {
        return $this->hasMany(InvestigationTest::class);
    }
}
