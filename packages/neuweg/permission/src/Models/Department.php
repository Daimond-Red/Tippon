<?php

namespace Neuweg\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $fillable = [
        'name',
        'tag',
    ];

}
