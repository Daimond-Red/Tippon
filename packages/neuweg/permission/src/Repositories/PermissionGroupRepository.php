<?php

namespace Neuweg\Permission\Repositories;

use Neuweg\Core\Repositories\Repository;
use Spatie\Permission\Models\Permission;

class PermissionGroupRepository extends Repository {

    public $model = '\Neuweg\Permission\Models\PermissionGroup';

    public $viewIndex = 'permissions::admin.permissionGroups.index';
    public $viewCreate = 'permissions::admin.permissionGroups.create';
    public $viewEdit = 'permissions::admin.permissionGroups.edit';
    public $viewShow = 'permissions::admin.permissionGroups.show';

    public $storeValidateRules = [
        'name'  => 'required|unique:permission_groups,name',
    ];

    public $updateValidateRules = [
        'name'  => 'required|unique:permission_groups,name',
    ];

    public function getRolesModel() {
        return new \Spatie\Permission\Models\Role;
    }

    public function getAttrs(){
        $attrs = parent::getAttrs();
        $attrs['tag'] = str_slug(request('name'), '_');
        return $attrs;
    }

    public function update($model, $attrs = null) {

        if( $val = request('name') ) $model->name = $val;
        $model->save();

        return $model;

    }

    public function findPermission( $id ) {

        return Permission::findById($id);

    }
}
