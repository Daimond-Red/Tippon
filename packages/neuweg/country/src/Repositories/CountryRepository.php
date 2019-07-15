<?php

namespace Neuweg\Country\Repositories;

use Neuweg\Core\Repositories\Repository;

class CountryRepository extends Repository
{
	public $model = '\Neuweg\Country\Models\Country';

    public $viewIndex  = 'country::admin.countries.index';
    public $viewCreate = 'country::admin.countries.create';
    public $viewEdit   = 'country::admin.countries.edit';
    public $viewShow   = 'country::admin.countries.show';

    public $storeValidateRules = [
        'name'     => 'required|unique:countries,name',
        'std_no'   => 'required' 
    ];

    public $updateValidateRules = [
        'name'     => 'required|unique:countries,name',
        'std_no'   => 'required'
    ];

    public function getAttrs() {
        $attrs = request()->all();

        $uploads = ['flag'];

        if (filter_var(request('flag'), FILTER_VALIDATE_URL)) {
            $attrs['flag'] = $this->download_image(request('flag'));
        } else {
            foreach ( $uploads as $upload ) {
                if( request()->hasFile($upload) ){
                    $attrs[$upload] = self::upload_file($upload);
                } elseif( $attrs && count($attrs) && array_key_exists($upload, $attrs) ) {
                    unset($attrs[$upload]);
                }
            }
        }
        
        return $attrs;
    }


}