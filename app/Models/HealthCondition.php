<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthCondition extends Model
{
    protected $fillable = [
        'weight',
        'height',
        'chronic_diseases',
        'please_mention',
        'undergoes_surgery',
        'type_of_operation',
        'sports_injuries',
        'type_of_injury',
        'swimmer_id',
    ];

    public function swimmer()
    {
        return $this->belongsTo(Swimmer::class);
    }
}
