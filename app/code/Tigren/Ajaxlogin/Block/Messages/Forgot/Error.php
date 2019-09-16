<?php
/**
 * @copyright Copyright (c) 2017 www.tigren.com
 */

namespace Tigren\Ajaxlogin\Block\Messages\Forgot;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

/**
 * Class Error
 * @package Tigren\Ajaxlogin\Block\Messages\Forgot
 */
class Error extends Template
{
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Error constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(Template\Context $context, Registry $registry, array $data)
    {
        parent::__construct($context, $data);
        $this->_coreRegistry = $registry;
    }

    /**
     * @return string
     */
    public function getForgotPasswordUrl()
    {
        return $this->_urlBuilder->getUrl('customer/account/forgotpassword');
    }

    /**
     * @return mixed
     */
    public function getEmailFromLayout()
    {
        return $this->_coreRegistry->registry('email');
    }
}