<?php

namespace Neuweg\Page\Repositories;

use Neuweg\Core\Repositories\Repository;

class PageRepository extends Repository
{
	public $model = '\Neuweg\Page\Models\Page';

    public $viewIndex = 'page::admin.pages.index';
    public $viewCreate = 'page::admin.pages.create';
    public $viewEdit = 'page::admin.pages.edit';
    public $viewShow = 'page::admin.pages.show';

    public $storeValidateRules = [
        'title'  => 'required|unique:pages,title',
    ];

    public $updateValidateRules = [
        'title'  => 'required|unique:pages,title',
    ];

    public function getAttrs() {

        $attrs = parent::getAttrs();
        if(!request('slug')) $attrs['slug'] = str_slug(request('title'), '-');
        return $attrs;

    }
}