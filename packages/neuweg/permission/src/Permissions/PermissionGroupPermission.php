<?php

namespace Neuweg\Permission\Permissions;

use Neuweg\Core\Permissions\Permission;

class PermissionGroupPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('permission_group_index');
    }

    public function create() {
        return $this->checkAuthNPer('permission_group_create');
    }

    public function edit() {
        return $this->checkAuthNPer('permission_group_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('permission_group_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('permission_group_show');
    }

}
