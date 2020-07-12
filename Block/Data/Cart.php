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

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use CHK\GoogleTagManager\Block\DataLayer;
use CHK\GoogleTagManager\Model\Cart as GtmCartModel;

/**
 * Class Cart
 * @package CHK\GoogleTagManager\Block\Data
 */
class Cart extends Template
{

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param Context $context
     * @param GtmCartModel $gtmCart
     * @param array $data
     */
    public function __construct(
        Context $context,
        GtmCartModel $gtmCart,
        $data = []
    ) {
        $this->gtmCart = $gtmCart;
        parent::__construct($context, $data);
    }

    /**
     * Add product data to datalayer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $tm DataLayer */
        $tm = $this->getParentBlock();
        $tm->addVariable('cart', $this->gtmCart->getCart());
        $tm->addVariable('event', 'cartPage');
        return $this;
    }
}
