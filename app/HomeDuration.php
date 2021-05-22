<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class HomeDuration extends Model
{

    protected $table = 'bravo_request_home_durations';

    protected $fillable = [
        'name',
        'content',
    ];

}

