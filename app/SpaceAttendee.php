<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceAttendee extends Model
{

    protected $table = 'bravo_request_space_attendees';

    protected $fillable = [
        'name',
        'content',
    ];

}

