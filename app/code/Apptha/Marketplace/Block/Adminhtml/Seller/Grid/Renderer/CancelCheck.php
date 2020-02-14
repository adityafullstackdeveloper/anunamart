<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Marketplace
 * @version     1.2
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2017 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */

namespace Apptha\Marketplace\Block\Adminhtml\Seller\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\Action;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;
use Magento\Framework\UrlInterface;

/**
 * This class used to renderer email in sellers grid
 */
class CancelCheck extends Action
{
    /**
     * Renders column
     *
     * @param DataObject $row
     * @return string
     */
    public function render(DataObject $row)
    {
        $customerId = $this->_getValue($row);
        $objectManager = ObjectManager::getInstance();
        $cancelCheckImage = $objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . 'Marketplace/Seller/cancel_check';
        $customerDetails = $objectManager->get('Apptha\Marketplace\Model\Seller')->load( $customerId, 'customer_id' );
        $url = $cancelCheckImage . $customerDetails->getCancelCheck();
        return '<a  href="' . $url . '" alt= "' . $customerDetails->getCancelCheck() . '" download><img src="' . $url . '" class="thumbnail"></a>';
    }
}