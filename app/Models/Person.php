<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'blood_group',
        'genotype',
        'phone',
        'address',
        'job_title',
        'blocked'
    ];

    public function donations () {
        return $this->hasMany(Donation::class);
    }

    public function orders () {
        return $this->hasMany(Order::class);
    }




}
