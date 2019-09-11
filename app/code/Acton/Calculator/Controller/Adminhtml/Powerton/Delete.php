<?php


namespace Acton\Calculator\Controller\Adminhtml\Powerton;

class Delete extends \Acton\Calculator\Controller\Adminhtml\Powerton
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('powerton_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Acton\Calculator\Model\Powerton::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Powerton.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['powerton_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Powerton to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
