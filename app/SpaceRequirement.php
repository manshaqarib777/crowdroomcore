<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceRequirement extends Model
{

    protected $table = 'bravo_request_space_requirements';

    protected $fillable = [
        'name',
        'content',
    ];

}

