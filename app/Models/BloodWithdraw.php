<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodWithdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'bottle_number',
        'time',
        'status',
        'notes',
        'faild',
    ];

    public  static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->bottle_number = self::all()->max('bottle_number') + 1;
        });
    }

    public function processable()
    {
        return $this->morphTo();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // public function directives()
    // {
    //     return $this->hasManyThrough(Derivative::class,Donation::class);
    // }
    
}
