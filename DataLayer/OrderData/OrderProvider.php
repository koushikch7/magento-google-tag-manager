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
 * Class OrderProvider
 * @package CHK\GoogleTagManager\DataLayer\OrderData
 */
class OrderProvider extends OrderAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getTransactionData();
        /** @var OrderAbstract $orderProvider */
        foreach ($this->getOrderProviders() as $orderProvider) {
            $orderProvider->setOrder($this->getOrder())->setTransactionData($data);

            $data = array_merge_recursive($data, $orderProvider->getData());
        }

        return $data;
    }
}
