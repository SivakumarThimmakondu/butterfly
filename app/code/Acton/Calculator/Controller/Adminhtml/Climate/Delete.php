<?php


namespace Acton\Calculator\Controller\Adminhtml\Climate;

class Delete extends \Acton\Calculator\Controller\Adminhtml\Climate
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
        $id = $this->getRequest()->getParam('climate_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Acton\Calculator\Model\Climate::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Climate.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['climate_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Climate to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
