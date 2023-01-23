<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCTTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'kid_id',
        'type',
        'employee_id',
        'status'
    ];
    public function kdi()
    {
        return $this->hasMany(Kid::class, 'kid_id');
    }
}
