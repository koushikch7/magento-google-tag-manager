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

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Helper\Data;
use Magento\Catalog\Model\Product\Type;

/**
 * Class Product
 * @package CHK\GoogleTagManager\Block\Data
 */
class Product extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * Catalog data
     *
     * @var Data
     */
    protected $catalogHelper = null;

    /**
     * @param Context|Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        $this->catalogHelper = $context->getCatalogHelper();
        parent::__construct($context, $data);
    }

    /**
     * Add product data to datalayer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $tm \CHK\GoogleTagManager\Block\DataLayer */
        $tm = $this->getParentBlock();

        $tm->addVariable(
            'list',
            'detail'
        );

        /** @var $product \Magento\Catalog\Api\Data\ProductInterface */
        $product = $this->getProduct();

        if ($product) {
            $tm->addVariable(
                'product',
                [
                    'id' => $product->getId(),
                    'sku' => $product->getSku(),
                    'parent_sku' => $product->getData('sku'),
                    'product_type' => $product->getTypeId(),
                    'name' => $product->getName(),
                    'price' => $this->getPrice($product, $tm),
                    'attribute_set_id' => $product->getAttributeSetId(),
                    'path' => implode(" > ", $this->getBreadCrumbPath()),
                ]
            );

            $tm->addVariable(
                'event',
                'productPage'
            );
        }

        return $this;
    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @param \CHK\GoogleTagManager\Block\DataLayer $tm
     * @return mixed
     */
    public function getPrice($product, $tm)
    {
        if ($product->getTypeId() == Type::TYPE_SIMPLE) {
            return $tm->formatPrice($product->getPrice());
        } else {
            return $tm->formatPrice($product->getFinalPrice());
        }
    }

    /**
     * Get bread crumb path
     *
     * @return array
     */
    protected function getBreadCrumbPath()
    {
        $titleArray = [];
        $breadCrumbs = $this->catalogHelper->getBreadcrumbPath();

        foreach ($breadCrumbs as $breadCrumb) {
            $titleArray[] = $breadCrumb['label'];
        }

        return $titleArray;
    }
}
