<?php

namespace Neuweg\PromotionImage\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\PromotionImage\Permissions\PromotionImagePermission as Permission;
use Neuweg\PromotionImage\Repositories\PromotionImageRepository as Repository;

class PromotionImageController extends BackendController
{
	public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }

}
