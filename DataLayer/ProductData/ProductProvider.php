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

namespace CHK\GoogleTagManager\DataLayer\ProductData;

/**
 * Class ProductProvider
 * @package CHK\GoogleTagManager\DataLayer\ProductData
 */
class ProductProvider extends ProductAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getTransactionData();
        /** @var ProductAbstract $productProvider */
        foreach ($this->getProductProviders() as $productProvider) {
            $productProvider->setProduct($this->getProduct())->setTransactionData($data);

            $data = array_merge_recursive($data, $productProvider->getData());
        }

        return $data;
    }
}
