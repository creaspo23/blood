<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'HB',
        'notes'
    ];

    public function processable () {
    return $this->morphTo();
    }
    public function mother () {
        return $this->morphTo();
        }

    public function employee () {
        return $this->belongsTo(Employee::class);
    }
}
