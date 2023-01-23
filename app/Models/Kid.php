<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Kid extends Pivot
{
    protected $fillable = [
        'mother_id',
        'kid_id',
        'type',
        'status'
    ];
    public function person()
    {
        return $this->belongsTo(Person::class, 'kid_id');
    }
    public function mothrName()
    {
        return $this->belongsTo(Person::class, 'mother_id');
    }

    public function bloodTest()
    {
        return $this->morphOne(BloodTest::class, 'processable');
    }
    public function motherBloodTest()
    {
        return $this->morphOne(BloodTest::class, 'mother');
    }

    public function ictTest()
    {
        return $this->hasOne(ICTTest::class, 'kid_id');
    }

    public function dctTest()
    {
        return $this->hasOne(DCTTest::class, 'kid_id');
    }
}
