<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//all-new-update


class HomeAmenity extends Model
{

    protected $table = 'bravo_request_home_amenities';

    protected $fillable = [
        'name',
        'content'
    ];

}

