<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Repositories\UserRepository as Repository;
use App\Basecode\Classes\Permissions\UserPermission as Permission;
use App\ParentUser;
use App\User;
use Spatie\Permission\Models\Role;
use App\State;
use App\City;
use Illuminate\Http\Request;
use Neuweg\Core\Controllers\Admin\BackendController;

class UserController extends BackendController {

    public $repository,  $permission;

    public function __construct(
        Repository $repository,
        Permission $permission
    ) {

        $this->repository = $repository;
        $this->permission = $permission;
    }


    public function index() {

        // if(! $this->permission->index()) return;
        
        $collection = $this->repository->getCollection()->get();
    	
        return view($this->repository->viewIndex, [
           'collection' => $collection,
           'repository' => $this->repository
        ]);
    }

}
