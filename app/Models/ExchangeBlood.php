<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeBlood extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_id',
        'derivative_id'
    ];

    public function exchange () {
        return $this->belongsTo(Exchange::class);
    }

    public function derivative () {
        return $this->belongsTo(Derivative::class);
    }
}
