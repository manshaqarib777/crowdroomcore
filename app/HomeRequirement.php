<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//all-new-update

class HomeRequirement extends Model
{

    protected $table = 'bravo_request_home_requirements';

    protected $fillable = [
        'name',
        'content',
    ];

}

