<?php

namespace Neuweg\Country\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Country\Permissions\CountryPermission as Permission;
use Neuweg\Country\Repositories\CountryRepository as Repository;

class CountryController extends BackendController
{
	public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }

}
