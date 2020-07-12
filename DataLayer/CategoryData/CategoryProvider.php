<?php
/**
 * Copyright © 2019 CHK. All rights reserved.
 * See COPYING.txt for license details.
 *
 * CHK_GoogleTagManager extension
 * NOTICE OF LICENSE
 *
 * @category 	GoogleTagManager
 * @package  	CHK_GoogleTagManager
 * @author   	Koushik CH <support@chkoushik.com>
 * @copyright   Copyright (c) Koushik CH (https://chkoushik.com/)
 */

namespace CHK\GoogleTagManager\DataLayer\CategoryData;

/**
 * Class CategoryProvider
 * @package CHK\GoogleTagManager\DataLayer
 */
class CategoryProvider extends CategoryAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getTransactionData();
        /** @var CategoryProvider $categoryProvider */
        foreach ($this->getCategoryProviders() as $categoryProvider) {
            $categoryProvider->setCategory($this->getCategory())->setTransactionData($data);
            $data = array_merge_recursive($data, $categoryProvider->getData());
        }

        return $data;
    }
}
