<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceDuration extends Model
{

    protected $table = 'bravo_request_space_durations';

    protected $fillable = [
        'name',
        'content',
    ];

}

