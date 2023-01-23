<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICTTest extends Model
{
    use HasFactory;

    protected $fillable = ['result', 'kid_id', 'employee_id'];

    public function kid()
    {
        return $this->hasMany(Kid::class, 'kdi_id');
    }
    
    public function processable()
    {
        return $this->morphTo();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
