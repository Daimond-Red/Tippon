<?php

namespace App\Basecode\Classes\Permissions;

class DepartmentPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('list_department');
    }

    public function create() {
        return $this->checkAuthNPer('add_department');
    }

    public function edit() {
        return $this->checkAuthNPer('edit_department');
    }

    public function destroy() {
        return $this->checkAuthNPer('delete_department');
    }

    public function show() {
        return $this->checkAuthNPer('edit_department');
    }

    public function create_designation() {
        return $this->checkAuthNPer('create_designation');
    }

    public function create_permission() {
        return $this->checkAuthNPer('permission_master');
    }

}