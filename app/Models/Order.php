<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'unit',
        'diagnosis',
        'fresh',
        'hospital',
        'type',
        'status'
    ];

    public function person () {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function donations () {
        return $this->hasMany(Donation::class);
    }

    public function bloods () {
        return $this->hasMany(OrderBlood::class);
    }

    public function bloodTest () {
        return $this->morphOne(BloodTest::class, 'processable');
    }

    public function doctorTest () {
        return $this->morphOne(DoctorTest::class, 'processable');
    }

    public function viralTest () {
        return $this->morphOne(ViralTest::class, 'processable');
    }
}
