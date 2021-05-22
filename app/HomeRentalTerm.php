<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//all-new-update

class HomeRentalTerm extends Model
{

    protected $table = 'bravo_request_home_rental_terms';

    protected $fillable = [
        'name',
        'content',
    ];

}

