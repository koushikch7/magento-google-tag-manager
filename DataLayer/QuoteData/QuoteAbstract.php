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

use Magento\Quote\Model\Quote;

/**
 * Class QuoteAbstract
 * @package CHK\GoogleTagManager\DataLayer\QuoteData
 */
abstract class QuoteAbstract
{
    /**
     * @var QuoteProvider[]
     */
    private $quoteProviders;

    /**
     * @var array
     */
    private $transactionData = [];

    /**
     * @var Quote
     */
    private $quote;

    /**
     * @param array $quoteProviders
     * @codeCoverageIgnore
     */
    public function __construct(
        array $quoteProviders = []
    ) {
        $this->quoteProviders = $quoteProviders;
    }

    /**
     * @return array
     */
    abstract public function getData();

    /**
     * @return array
     */
    public function getTransactionData()
    {
        return (array) $this->transactionData;
    }

    /**
     * @param array $transactionData
     * @return QuoteAbstract
     */
    public function setTransactionData(array $transactionData)
    {
        $this->transactionData = $transactionData;
        return $this;
    }

    /**
     * @return Quote
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param Quote $quote
     * @return QuoteAbstract
     */
    public function setQuote(Quote $quote)
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * @return QuoteProvider[]
     */
    public function getQuoteProviders()
    {
        return $this->quoteProviders;
    }
}
