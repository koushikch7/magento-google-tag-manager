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

namespace CHK\GoogleTagManager\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use CHK\GoogleTagManager\Model\Cart as GtmCartModel;
use CHK\GoogleTagManager\Model\Customer as GtmCustomerModel;

/**
 * Class JsDataLayer
 * @package CHK\GoogleTagManager\CustomerData
 */
class JsDataLayer implements SectionSourceInterface
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param GtmCustomerModel $gtmCustomer
     * @param GtmCartModel $gtmCart
     */
    public function __construct(
        GtmCustomerModel $gtmCustomer,
        GtmCartModel $gtmCart
    ) {
        $this->gtmCustomer = $gtmCustomer;
        $this->gtmCart = $gtmCart;
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function getSectionData()
    {
        return [
            'customer' => $this->gtmCustomer->getCustomer(),
            'cart' => $this->gtmCart->getCart()
        ];
    }
}
