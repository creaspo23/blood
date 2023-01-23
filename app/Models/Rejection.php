<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'stage',
        'reasons'
    ];

    public function donation () {
        return $this->belongsTo(Donation::class);
    }
}
