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

namespace CHK\GoogleTagManager\Block;

use Magento\Cookie\Helper\Cookie;
use CHK\GoogleTagManager\Block\Data\Order;
use CHK\GoogleTagManager\Model\Config\Source\GdprOption;

/**
 * Class DataLayer
 * @package CHK\GoogleTagManager\Block
 */
class DataLayer extends DataLayerAbstract
{

    /**
     * Render tag manager script
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_gtmHelper->isEnabled()) {
            return '';
        }

        /** @var $blockOnepageOrder Order */
        if ($this->getOrderIds() && $blockOnepageOrder = $this->getChildBlock("chk_gtm_block_order")) {
            $blockOnepageOrder->setOrderIds($this->getOrderIds())->addOrderLayer();
        }

        return parent::_toHtml();
    }

    /**
     * Get Account Id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->_gtmHelper->getAccountId();
    }

    /**
     * @param null $store_id
     * @return int
     */
    public function getGdprOption($store_id = null)
    {
        return $this->_gtmHelper->getGdprOption($store_id);
    }

    /**
     * @param null $store_id
     * @return string
     */
    public function getCookieRestrictionName($store_id = null)
    {
        if ($this->_gtmHelper->getGdprOption($store_id) == GdprOption::USE_COOKIE_RESTRICTION_MODE) {
            return Cookie::IS_USER_ALLOWED_SAVE_COOKIE;
        } else {
            return $this->_gtmHelper->getCookieRestrictionName($store_id) ?
                $this->_gtmHelper->getCookieRestrictionName($store_id) : Cookie::IS_USER_ALLOWED_SAVE_COOKIE;
        }
    }

    /**
     * @param null $store_id
     * @return bool
     */
    public function isGdprEnabled($store_id = null)
    {
        return (int) $this->_gtmHelper->isGdprEnabled($store_id);
    }
}
