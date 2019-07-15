<?php

namespace Neuweg\Page\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Page\Permissions\PagePermission as Permission;
use Neuweg\Page\Repositories\PageRepository as Repository;

class PageController extends BackendController
{
	public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }

}
