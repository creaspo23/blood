<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'order_id',
        'type'
    ];

    public function external () {
        return $this->hasOne(ExternalExchange::class);
    }

    public function bloods () {
        return $this->hasMany(ExchangeBlood::class);
    }
}
