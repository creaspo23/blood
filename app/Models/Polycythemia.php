<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polycythemia extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'type',
        'HB',
        'WBCs',
        'platelets',
        'BP',
        'status'
    ];

    public function person () {
        return $this->belongsTo(Person::class);
    }

    public function bloodTest () {
        return $this->morphOne(BloodTest::class, 'processable');
    }

    public function doctorTest () {
        return $this->morphOne(DoctorTest::class, 'processable');
    }
    public function bloodWithdraw () {
        return $this->morphOne(BloodWithdraw::class, 'processable');
    }
}
