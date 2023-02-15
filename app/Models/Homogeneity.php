<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homogeneity extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'order_id', 'dontion_id', 'bottels', 'status','employee_id'];


    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

  
}
