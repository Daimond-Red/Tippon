<?php

namespace App\Basecode\Classes\Repositories;

class DepartmentRepository extends Repository
{
	public $model = '\App\Department';

    public $viewIndex = 'admin.departments.index';
    public $viewCreate = 'admin.departments.create';
    public $viewEdit = 'admin.departments.edit';
    public $viewShow = 'admin.departments.show';

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
	
}