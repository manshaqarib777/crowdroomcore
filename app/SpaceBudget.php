<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//new-updates

class SpaceBudget extends Model
{

    protected $table = 'bravo_request_space_budgets';

    protected $fillable = [
        'name',
        'content',
    ];

}

