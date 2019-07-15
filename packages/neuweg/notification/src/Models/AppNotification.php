<?php

namespace Neuweg\Notification\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AppNotification extends Model
{
    protected $fillable = [
    	'title',
    	'message'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
