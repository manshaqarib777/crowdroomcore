<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class HomePreferredArea extends Model
{

    protected $table = 'bravo_request_home_preferred_areas';

    protected $fillable = [
        'name',
        'content',
    ];

}

