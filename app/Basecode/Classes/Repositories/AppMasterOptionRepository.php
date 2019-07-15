<?php

namespace App\Basecode\Classes\Repositories;

class AppMasterOptionRepository extends Repository
{
	public $model = '\App\AppMasterOption';

    public $viewIndex = 'admin.options.index';
    public $viewCreate = 'admin.options.create';
    public $viewEdit = 'admin.options.edit';
    public $viewShow = 'admin.options.show';

    public $storeValidateRules = [
        'title'  => 'required|unique:app_master_options,title',
    ];

    public $updateValidateRules = [
        'title'  => 'required|unique:app_master_options,title',
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);
        
        $attrs['tag'] = str_slug(request('title'), '_');
        $attrs['app_master_id'] = \request('masterId');

        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }
}