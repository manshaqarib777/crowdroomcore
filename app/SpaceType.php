<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceType extends Model
{

    protected $table = 'bravo_request_space_types';

    protected $fillable = [
        'name',
        'content',
    ];

}

