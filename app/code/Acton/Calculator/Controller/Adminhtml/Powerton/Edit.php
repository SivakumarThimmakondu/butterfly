<?php


namespace Acton\Calculator\Controller\Adminhtml\Powerton;

class Edit extends \Acton\Calculator\Controller\Adminhtml\Powerton
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('powerton_id');
        $model = $this->_objectManager->create(\Acton\Calculator\Model\Powerton::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Powerton no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('acton_calculator_powerton', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Powerton') : __('New Powerton'),
            $id ? __('Edit Powerton') : __('New Powerton')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Powertons'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Powerton %1', $model->getId()) : __('New Powerton'));
        return $resultPage;
    }
}
