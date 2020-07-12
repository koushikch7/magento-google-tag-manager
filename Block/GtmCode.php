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

use Magento\Cookie\Helper\Cookie as CookieHelper;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use CHK\GoogleTagManager\Helper\Data as GtmHelper;

/**
 * Class GtmCode
 * @package CHK\GoogleTagManager\Block
 */
class GtmCode extends Template
{

    /**
     * @var GtmHelper
     */
    protected $_gtmHelper = null;

    /**
     * Cookie Helper
     *
     * @var CookieHelper
     */
    protected $_cookieHelper = null;

    /**
     * @param Context $context
     * @param CookieHelper $cookieHelper
     * @param GtmHelper $gtmHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        CookieHelper $cookieHelper,
        GtmHelper $gtmHelper,
        array $data = []
    ) {
        $this->_cookieHelper = $cookieHelper;
        $this->_gtmHelper = $gtmHelper;
        parent::__construct($context, $data);
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
     * @return string
     */
    public function getDataLayerName()
    {
        return $this->_gtmHelper->getDataLayerName();
    }

    /**
     * Render tag manager JS
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_gtmHelper->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }
}
