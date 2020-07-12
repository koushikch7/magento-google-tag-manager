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

namespace CHK\GoogleTagManager\DataLayer\QuoteData;

/**
 * Class QuoteItemProvider
 * @package CHK\GoogleTagManager\DataLayer\QuoteData
 */
class QuoteItemProvider extends QuoteItemAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getItemData();
        /** @var QuoteItemAbstract $quoteItemProvider */
        foreach ($this->getQuoteItemProviders() as $quoteItemProvider) {
            $quoteItemProvider->setItem($this->getItem())->setItemData($data);

            $data = array_merge_recursive($data, $quoteItemProvider->getData());
        }

        return $data;
    }
}
