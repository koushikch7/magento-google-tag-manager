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

/**
 * Class Order
 * @package CHK\GoogleTagManager\Block\Data
 * @method Array setOrderIds(Array $orderIds)
 * @method Array getOrderIds()
 */
class Order extends Template
{
    /** @var \CHK\GoogleTagManager\Model\Order */
    protected $orderDataArray;

    /**
     * @param Context $context
     * @param \CHK\GoogleTagManager\Model\Order $orderDataArray
     * @param array $data
     */
    public function __construct(
        Context $context,
        \CHK\GoogleTagManager\Model\Order $orderDataArray,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->orderDataArray = $orderDataArray;
    }

    /**
     * Render information about specified orders and their items
     *
     * @return void|string
     */
    public function addOrderLayer()
    {
        $transactions = $this->orderDataArray->setOrderIds($this->getOrderIds())->getOrderLayer();

        if (!empty($transactions)) {
            /** @var $tm DataLayer */
            $tm = $this->getParentBlock();
            foreach ($transactions as $order) {
                $tm->addAdditionalVariable($order);
            }
        }
    }
}
