<?php


namespace Acton\Calculator\Controller\Adminhtml\Btu;

class Delete extends \Acton\Calculator\Controller\Adminhtml\Btu
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
        $id = $this->getRequest()->getParam('btu_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Acton\Calculator\Model\Btu::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Btu.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['btu_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Btu to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
