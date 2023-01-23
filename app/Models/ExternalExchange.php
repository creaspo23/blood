<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_id',
        'person_id',
        'hospital'
    ];

    public function exchange () {
        return $this->belongsTo(Exchange::class);
    }

    public function person () {
        return $this->belongsTo(Person::class);
    }
}
