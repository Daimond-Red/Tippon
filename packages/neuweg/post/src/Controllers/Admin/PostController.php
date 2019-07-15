<?php

namespace Neuweg\Post\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Post\Permissions\PostPermission as Permission;
use Neuweg\Post\Repositories\PostRepository as Repository;

class PostController extends BackendController
{
	public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }

}
