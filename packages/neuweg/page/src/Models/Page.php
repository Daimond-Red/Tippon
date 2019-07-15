<?php

namespace Neuweg\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    	'title',
    	'slug',
    	'body'
    ];
}
