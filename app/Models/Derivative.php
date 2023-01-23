<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derivative extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_withdraw_id',
        'employee_id',
        'bottle_number',
        'blood_type',
        'expire_date',
        'exchanged'
    ];

    public  static function boot(){
        parent::boot();
        static::creating(function($model){
            $letters = [
                'الدم الكامل' => 'A',
                'الدم الاحمر' => 'R',
                'الراسب المتجمد' => 'F',
                'البلازما' => 'B',
                'الصفائح' => 'p',
            ];

            $model->bottle_number = $letters[$model->blood_type] . '-' . BloodWithdraw::find($model->blood_withdraw_id)->bottle_number;
            $model->expire_date = now()->addDays(35);
        });
    }

    public function Withdraw () {
        return $this->belongsTo(BloodWithdraw::class, 'blood_withdraw_id');
    }

    public function employee () {
        return $this->belongsTo(Employee::class);
    }

    public function exchange () {
        return $this->hasOne(ExchangeBlood::class);
    }
}
