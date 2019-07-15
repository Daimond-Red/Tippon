<?php

namespace App\Basecode\Classes\Permissions;

class UserPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('phlebo_list_user');
    }

    public function courierIndex() {
        return $this->checkAuthNPer('courier_list_user');
    }

    public function salesIndex() {
        return $this->checkAuthNPer('sales_list_user');
    }

    public function create() {
        return $this->checkAuthNPer('add_user');
    }

    public function edit() {
        return $this->checkAuthNPer('edit_user');
    }

    public function destroy() {
        return $this->checkAuthNPer('delete_user');
    }

    public function show() {
        return $this->checkAuthNPer('edit_user');
    }
    
    public function profile() {
        return $this->checkAuthNPer('edit_user');
    }

    public function report_index() {
        return $this->checkAuthNPer('user_list');
    }

    public function import_employees() {
        return $this->checkAuthNPer('import_employees');
    }

    public function hierarchyMaster() {
        return $this->checkAuthNPer('hierarchy_master');
    }

    public function hierarchyMasterCreate() {
        return $this->checkAuthNPer('hierarchy_master');
    }

    public function hierarchyMasterEdit() {
        return $this->checkAuthNPer('hierarchy_master');
    }

    
}
