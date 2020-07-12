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

namespace CHK\GoogleTagManager\DataLayer\OrderData;

/**
 * Class OrderItemProvider
 * @package CHK\GoogleTagManager\DataLayer\OrderData
 */
class OrderItemProvider extends OrderItemAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getItemData();
        /** @var OrderItemAbstract $orderItemProvider */
        foreach ($this->getOrderItemProviders() as $orderItemProvider) {
            $orderItemProvider->setItem($this->getItem())->setItemData($data);

            $data = array_merge_recursive($data, $orderItemProvider->getData());
        }

        return $data;
    }
}
