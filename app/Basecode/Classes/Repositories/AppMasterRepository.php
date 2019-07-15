<?php

namespace App\Basecode\Classes\Repositories;

class AppMasterRepository extends Repository
{
	
	public $model = '\App\AppMaster';

    public $viewIndex = 'admin.appMasters.index';
    public $viewCreate = 'admin.appMasters.create';
    public $viewEdit = 'admin.appMasters.edit';
    public $viewShow = 'admin.appMasters.show';

    public $storeValidateRules = [
        'title'  => 'required|unique:app_masters,title',
    ];

    public $updateValidateRules = [
        'title'  => 'required|unique:app_masters,title',
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);
        $attrs['tag'] = str_slug(request('title'), '_');
        
        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }
}