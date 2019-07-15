<?php

namespace Neuweg\Country\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
    	'name',
		'flag',
		'std_no',
    ];
}
