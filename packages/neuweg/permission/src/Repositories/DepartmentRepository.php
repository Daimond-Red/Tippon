<?php

namespace Neuweg\Permission\Repositories;

use Neuweg\Core\Repositories\Repository;

class DepartmentRepository extends Repository {

    public $model = '\Neuweg\Permission\Models\Department';

    public $viewIndex = 'permissions::admin.departments.index';
    public $viewCreate = 'permissions::admin.departments.create';
    public $viewEdit = 'permissions::admin.departments.edit';
    public $viewShow = 'permissions::admin.departments.show';

    public $storeValidateRules = [
        'name'  => 'required|unique:departments,name',
    ];

    public $updateValidateRules = [
        'name'  => 'required|unique:departments,name',
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
}
