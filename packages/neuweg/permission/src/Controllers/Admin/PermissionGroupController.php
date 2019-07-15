<?php

namespace Neuweg\Permission\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Permission\Permissions\PermissionGroupPermission as Permission;
use Neuweg\Permission\Repositories\PermissionGroupRepository as Repository;

class PermissionGroupController extends BackendController {

    public $repository, $permission;

    public function __construct(Repository $repository, Permission $permission) {

        $this->repository = $repository;
        $this->permission = $permission;
        parent::__construct($repository, $permission);

    }

    public function permissionGroupOptionCreate( $id ) {

        if(! $this->permission->create() ) return noAuth();

        $model = $this->repository->find($id);

        return view('permissions::admin.permissions.create', [
            'repository' => $this->repository,
            'permission' => $this->permission,
            'model'      => $model
        ]);

    }

    public function permissionGroupOptions( $id ) {

        if(! $this->permission->index() ) return noAuth();

        $model = $this->repository->find($id);

        return view('permissions::admin.permissions.index', [
            'repository' => $this->repository,
            'permission' => $this->permission,
            'collection' => $model->options,
            'model'      => $model
        ]);

    }

    public function permissionGroupOptionsStore( $id ) {

        if(! $this->permission->create() ) return noAuth();

        request()->validate(['name' => 'required']);

        $model = $this->repository->find($id);

        $tag = $model->tag. '_'. str_slug(request('name'), '_');

        if( $err = cvalidate([ 'name' => 'required|unique:permissions,name' ], ['name' => $tag]) ) return $this->repository->redirectBackWithErrors('Already available');

        \Spatie\Permission\Models\Permission::create([
            'name'                  => $tag,
            'display_name'          => request('name'),
            'permission_group_id'   => $model->id
        ]);

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }

    public function permissionGroupOptionEdit( $id ) {

        if(! $this->permission->edit() ) return noAuth();

        $model = $this->repository->findPermission($id);

        return view('permissions::admin.permissions.edit', [
            'repository' => $this->repository,
            'permission' => $this->permission,
            'model'      => $model
        ]);

    }

    public function permissionGroupOptionUpdate( $id ) {

        if(! $this->permission->edit() ) return noAuth();

        $model = $this->repository->findPermission($id);

        if( $val = request('display_name') ) $model->display_name = $val;

        $model->save();

        return $this->repository->redirectBackWithSuccess($this->repository->update_msg);

    }

    public function permissionGroupOptionDelete( $id ) {

        if(! $this->permission->destroy() ) return noAuth();

        $model = $this->repository->findPermission($id);

        $model->delete();

        return $this->repository->redirectBackWithSuccess($this->repository->delete_msg);

    }

}
