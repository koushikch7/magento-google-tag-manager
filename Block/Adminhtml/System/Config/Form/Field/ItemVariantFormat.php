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

namespace CHK\GoogleTagManager\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class ItemVariantFormat
 * @package CHK\GoogleTagManager\Block\Adminhtml\System\Config\Form\Field
 */
class ItemVariantFormat implements ArrayInterface
{
    /**
     * Short format
     */
    const SHORT_FORMAT = 1;

    /**
     * long format
     */
    const LONG_FORMAT = 2;

    const DEFAULT_FORMAT = self::SHORT_FORMAT;

    const FORMAT = [
        self::SHORT_FORMAT => '{{value}}',
        self::LONG_FORMAT => '{{label}} / {{value}}'
    ];

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Option Value (XS/Black)'), 'value' => self::SHORT_FORMAT],
            ['label' => __('Option Name : Option Value (Size : XS / Color : Black)'), 'value' => self::LONG_FORMAT]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            [self::SHORT_FORMAT => __('Option Value (XS/Black)')],
            [self::LONG_FORMAT => __('Option Name : Option Value (Size : XS / Color : Black)')]
        ];
    }
}
