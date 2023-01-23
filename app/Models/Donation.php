<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'order_id',
        'status'
    ];

    public function order () {
        return $this->belongsTo(Order::class);
    }

    public function person () {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function rejection () {
        return $this->hasOne(Rejection::class);
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

    public function bloodWithdraw () {
        return $this->morphOne(BloodWithdraw::class, 'processable');
    }
}
