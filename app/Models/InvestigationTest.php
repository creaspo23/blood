<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'investigation_id',
        'test',
        'result',
        'mean'
    ];

    public function investigation () {
        return $this->belongsTo(Investigation::class);
    }
}
