<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceLocation extends Model
{

    protected $table = 'bravo_request_space_locations';

    protected $fillable = [
        'name',
        'content',
    ];

}

