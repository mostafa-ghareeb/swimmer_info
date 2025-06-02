<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Swimmer extends Model
{
    protected $fillable = [
        'name',
        'address',
        'religion',
        'membership_type',
        'phone',
        'whatsapp_phone',
        'father_phone',
        'educational_qualification',
        'father_job',
        'birthdate',
        'image',
        'national_ID',
        'membership_number',
        'current_work',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function healthConditions()
    {
        return $this->hasone(HealthCondition::class);
    }

    public function sportdatas()
    {
        return $this->hasone(Sportdata::class);
    }
}
