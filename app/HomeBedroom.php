<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//all-new-updates

class HomeBedroom extends Model
{

    protected $table = 'bravo_request_home_bedrooms';

    protected $fillable = [
        'name',
        'content',
    ];

}

