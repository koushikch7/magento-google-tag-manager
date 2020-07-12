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
 * Class QuoteProvider
 * @package CHK\GoogleTagManager\DataLayer\QuoteData
 */
class QuoteProvider extends QuoteAbstract
{
    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getTransactionData();
        /** @var QuoteAbstract $quoteProvider */
        foreach ($this->getQuoteProviders() as $quoteProvider) {
            $quoteProvider->setQuote($this->getQuote())->setTransactionData($data);

            $data = array_merge_recursive($data, $quoteProvider->getData());
        }

        return $data;
    }
}
