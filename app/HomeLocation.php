<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class HomeLocation extends Model
{

    protected $table = 'bravo_request_home_locations';

    protected $fillable = [
        'name',
        'content',
    ];

}

