<?php

namespace Neuweg\PromotionImage\Repositories;

use Neuweg\Core\Repositories\Repository;

class PromotionImageRepository extends Repository
{
	public $model = '\Neuweg\PromotionImage\Models\PromotionImage';

    public $viewIndex    = 'promotionImage::admin.promotionImages.index';
    public $viewCreate   = 'promotionImage::admin.promotionImages.create';
    public $viewEdit     = 'promotionImage::admin.promotionImages.edit';
    public $viewShow     = 'promotionImage::admin.promotionImages.show';

    public $storeValidateRules = [
        'title'  => 'required|unique:promotion_images,title',
    ];

    public $updateValidateRules = [
        'title'  => 'required|unique:promotion_images,title',
    ];

}