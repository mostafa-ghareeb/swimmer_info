<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sportdata extends Model
{
    protected $fillable = [
        'member_of_other_clubs',
        'other_clubs',
        'did_you_play_for_other_club',
        'have_you_obtained_the_star_tests_and_their_number',
        'where_to_get_star_tests',
        'union_registration_number',
        'swimmer_id',
    ];

    public function swimmer()
    {
        return $this->belongsTo(Swimmer::class);
    }
}
