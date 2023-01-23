<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViralTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'result',
        'notes'
    ];

    public function processable () {
        return $this->morphTo();
    }

    public function employee () {
        return $this->belongsTo(Employee::class);
    }
}
