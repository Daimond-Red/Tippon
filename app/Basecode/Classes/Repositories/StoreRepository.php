<?php

namespace App\Basecode\Classes\Repositories;

class StoreRepository extends Repository
{
	
	public $model = '\App\Store';

    public $viewIndex = 'admin.masters.stores.index';
    public $viewCreate = 'admin.masters.stores.create';
    public $viewEdit = 'admin.masters.stores.edit';
    public $viewShow = 'admin.masters.stores.show';

    public $storeValidateRules = [
        'name'  => 'required|unique:stores,name',
        'place' => 'required'
    ];

    public $updateValidateRules = [
        'name'  => 'required|unique:stores,name',
        'place' => 'required'
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);
        
        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }

    public function update($model, $attrs = null) {
        if(! $attrs ) $attrs = $this->getAttrs();

        $model->fill($attrs);
        $model->update();
        return $model;
    }

    public function getAttrs() {
        $attrs = request()->all();

        $uploads = ['image'];

        if (filter_var(request('image'), FILTER_VALIDATE_URL)) {
            $attrs['image'] = $this->download_image(request('image'));
        } else {
            foreach ( $uploads as $upload ) {
                if( request()->hasFile($upload) ){
                    $attrs[$upload] = self::upload_file($upload);
                } elseif( $attrs && count($attrs) && array_key_exists($upload, $attrs) ) {
                    unset($attrs[$upload]);
                }
            }
        }

        if( $val = request('place') ) {

            $val = \request('city').', '.\request('state');

            $addressData = getAddressFromGoogle($val);
            $attrs['lat'] = $addressData['lat'];
            $attrs['lng'] = $addressData['lng'];
        }

        return $attrs;
    }
}