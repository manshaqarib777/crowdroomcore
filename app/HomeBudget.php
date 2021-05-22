<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class HomeBudget extends Model
{

    protected $table = 'bravo_request_home_budgets';

    protected $fillable = [
        'name',
        'content',
    ];

}

