<?php

namespace Neuweg\Notification\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Notification\Permissions\NotificationPermission as Permission;
use Neuweg\Notification\Repositories\NotificationRepository as Repository;
Use App\User;

class NotificationController extends BackendController
{
	public $permission, $repository;

    public function __construct(Repository $repository, Permission $permission) {
        $this->permission = $permission;
        $this->repository = $repository;
        parent::__construct($repository, $permission);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        if(! $this->permission->create() ) return;

        $collection = User::whereNotIn('type', [User::SUPERADMIN]);
        $allUserIds = $collection->pluck('id')->toArray();
        $collection = $collection->get();

        return view($this->repository->viewCreate, [
            'repository'        => $this->repository,
            'collection'        => $collection,
            'allUserIds'        => $allUserIds,
        ]);

    }
}
