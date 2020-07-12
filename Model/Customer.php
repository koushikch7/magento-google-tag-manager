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

namespace CHK\GoogleTagManager\Model;

use Magento\Customer\Model\Session;
use Magento\Framework\DataObject;

/**
 * Class Customer
 * @package CHK\GoogleTagManager\Model
 */
class Customer extends DataObject
{

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Customer constructor.
     * @param Session $customerSession
     * @param array $data
     */
    public function __construct(
        Session $customerSession,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($data);
    }

    /**
     * Get Customer array
     *
     * @return array
     */
    public function getCustomer()
    {
        $isLoggedIn = $this->customerSession->isLoggedIn();
        $data = [
            'isLoggedIn' => $isLoggedIn,
        ];

        if ($isLoggedIn) {
            $data['id'] = $this->customerSession->getCustomerId();
            $data['groupId'] = $this->customerSession->getCustomerGroupId();
        }

        return $data;
    }
}
