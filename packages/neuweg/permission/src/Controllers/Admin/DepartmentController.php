<?php

namespace Neuweg\Permission\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Permission\Permissions\DepartmentPermission as Permission;
use Neuweg\Permission\Repositories\DepartmentRepository as Repository;
use Spatie\Permission\Models\Role;

class DepartmentController extends BackendController {

    public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }

    public function index() {

        if(! $this->permission->index() ) return noAuth();

        $collection = $this->repository->getCollection()->get();

        return view($this->repository->viewIndex, [
            'collection' => $collection,
            'repository' => $this->repository,
            'permission' => $this->permission,
        ]);

    }

    public function designation_create($departmentId) {

        if(! $this->permission->create_designation() ) return noAuth();

        $model = $this->repository->find($departmentId);

        return view('permissions::admin.designations.create', compact('model'));

    }

    public function designation_store($departmentId) {

        if(! $this->permission->create_designation() ) return noAuth();

        request()->validate( getValidationRules(['name' => 'required|unique:roles,name']));

        $model = $this->repository->find($departmentId);

        try{
            Role::create([
                'display_name'  => request('name', ''),
                'name'          => str_slug($model->name, '_'). '_'. str_slug(request('name', ''), '_'),
                'department_id' => $model->id
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();die;
            return redirect()->back()->withErrors('This already exists');
        }


        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }

    public function permission_create() {

        if(! $this->permission->create_permission() ) return noAuth();

        $department_select = [ '' => 'Please select'] + $this->repository->getCollection()->pluck('name', 'id')->toArray();

        return view('permissions::admin.permissionConfigs.create', compact('department_select'));

    }

    public function permission_store() {

        if(! $this->permission->create_permission() ) return noAuth();
        $role_id = decrypt(request('_id'));

        $role = Role::findById($role_id);
        $role->syncPermissions(request('permissions', []));

        return redirect()->back();

    }

    public function permission_viewDesignation() {

        if(! $this->permission->create_permission() ) return noAuth();

        if(!request('department')) return view('permissions::admin.permissionConfigs.designation');

        $model = $this->repository->find(request('department'));

        $designation_select = [ '' => 'Please select'] + Role::where('department_id', $model->id)->pluck('display_name', 'name')->toArray();

        return view('permissions::admin.permissionConfigs.designation', compact('model', 'designation_select'));

    }

    public function permission_viewMenu() {

        if(! $this->permission->create_permission() ) return noAuth();

        if(!request('designation')) return view('permissions::admin.permissionConfigs.permissions');

        $role = Role::findByName(request('designation'));

        $permissions = \Spatie\Permission\Models\Permission::all();

        $permissionNames = $role->permissions()->pluck('name')->toArray();

        return view('permissions::admin.permissionConfigs.permissions', compact('role', 'permissions', 'permissionNames'));

    }

}
