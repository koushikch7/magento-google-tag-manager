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

namespace CHK\GoogleTagManager\Block\Data;

use Magento\Framework\View\Element\Template\Context;
use CHK\GoogleTagManager\Model\Customer as GtmCustomerModel;

/**
 * Class Customer
 * @package CHK\GoogleTagManager\Block\Data
 */
class Customer extends \Magento\Framework\View\Element\Template
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @param Context $context
     * @param GtmCustomerModel $gtmCustomer
     * @param array $data
     */
    public function __construct(
        Context $context,
        GtmCustomerModel $gtmCustomer,
        array $data = []
    ) {
        $this->gtmCustomer = $gtmCustomer;
        parent::__construct($context, $data);
    }
    /**
     * Add product data to datalayer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $tm \CHK\GoogleTagManager\Block\DataLayer */
        $tm = $this->getParentBlock();
        $tm->addVariable('customer', $this->gtmCustomer->getCustomer());

        return $this;
    }
}
