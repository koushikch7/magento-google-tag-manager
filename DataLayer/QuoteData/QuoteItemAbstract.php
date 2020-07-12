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

use Magento\Quote\Model\Quote\Item;

/**
 * Class QuoteItemAbstract
 * @package CHK\GoogleTagManager\DataLayer\QuoteData
 */
abstract class QuoteItemAbstract
{
    const LIST_TYPE_GOOGLE = 1;

    const LIST_TYPE_GENERIC = 2;

    const ACTION_ADDED_ITEM = 1;

    const ACTION_REMOVED_ITEM = 2;

    const ACTION_UPDATED_ITEM = 3;

    const ACTION_VIEW_CART = 4;

    /**
     * @var
     */
    protected $actionType;

    /**
     * @var
     */
    protected $listType;

    /**
     * @var QuoteItemProvider[]
     */
    private $quoteItemProviders;

    /**
     * @var array
     */
    private $itemData = [];

    /**
     * @var Item
     */
    private $item;

    /**
     * @param array $quoteItemProviders
     * @codeCoverageIgnore
     */
    public function __construct(
        array $quoteItemProviders = []
    ) {
        $this->quoteItemProviders = $quoteItemProviders;
    }

    /**
     * @return array
     */
    public function getItemData()
    {
        return (array) $this->itemData;
    }

    /**
     * @param array $itemData
     * @return QuoteItemAbstract
     */
    public function setItemData(array $itemData)
    {
        $this->itemData = $itemData;
        return $this;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return QuoteItemAbstract
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return array|QuoteItemAbstract[]
     */
    public function getQuoteItemProviders()
    {
        return $this->quoteItemProviders;
    }

    /**
     * @return mixed
     */
    public function getListType()
    {
        return $this->listType;
    }

    /**
     * @param mixed $listType
     * @return QuoteItemAbstract
     */
    public function setListType($listType)
    {
        $this->listType = $listType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * @param mixed $actionType
     * @return QuoteItemAbstract
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
        return $this;
    }
}
