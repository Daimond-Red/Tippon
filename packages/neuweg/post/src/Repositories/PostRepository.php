<?php

namespace Neuweg\Post\Repositories;

use Neuweg\Core\Repositories\Repository;

class PostRepository extends Repository
{
	public $model = '\Neuweg\Post\Models\Post';

    public $viewIndex = 'post::admin.posts.index';
    public $viewCreate = 'post::admin.posts.create';
    public $viewEdit = 'post::admin.posts.edit';
    public $viewShow = 'post::admin.posts.show';

    public $storeValidateRules = [
        'title'  => 'required|unique:posts,title',
    ];

    public $updateValidateRules = [
        'title'  => 'required|unique:posts,title',
    ];

}