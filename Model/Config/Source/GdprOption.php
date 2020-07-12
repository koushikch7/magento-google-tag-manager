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
namespace CHK\GoogleTagManager\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class GdprType
 * @package CHK\GmailSmtpApp\Model\Config\Source
 */
class GdprOption implements ArrayInterface
{
    const USE_COOKIE_RESTRICTION_MODE = 1;
    const IF_COOKIE_EXIST = 2;
    const IF_COOKIE_NOT_EXIST = 3;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::USE_COOKIE_RESTRICTION_MODE, 'label' => __('Use Magento Cookie Restriction Mode')],
            ['value' => self::IF_COOKIE_EXIST, 'label' => __('Enable Google Analytics Tracking if Cookie Exist')],
            ['value' => self::IF_COOKIE_NOT_EXIST, 'label' => __('Disable Google Analytics Tracking if Cookie Exist')]
        ];
    }
}
