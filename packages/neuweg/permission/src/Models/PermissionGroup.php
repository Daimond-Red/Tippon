<?php

namespace Neuweg\Permission\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionGroup extends Model {

    protected $guarded = [];

    public function options() {
        return $this->hasMany(Permission::class, 'permission_group_id');
    }

}
