<?php


namespace Acton\Calculator\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\DataObjectHelper;
use Acton\Calculator\Api\Data\BtuInterfaceFactory;
use Acton\Calculator\Api\BtuRepositoryInterface;
use Acton\Calculator\Api\Data\BtuSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Acton\Calculator\Model\ResourceModel\Btu as ResourceBtu;
use Magento\Store\Model\StoreManagerInterface;
use Acton\Calculator\Model\ResourceModel\Btu\CollectionFactory as BtuCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class BtuRepository implements BtuRepositoryInterface
{

    protected $btuFactory;

    protected $btuCollectionFactory;

    protected $resource;

    protected $dataObjectHelper;

    private $collectionProcessor;

    protected $searchResultsFactory;

    protected $dataBtuFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;


    /**
     * @param ResourceBtu $resource
     * @param BtuFactory $btuFactory
     * @param BtuInterfaceFactory $dataBtuFactory
     * @param BtuCollectionFactory $btuCollectionFactory
     * @param BtuSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceBtu $resource,
        BtuFactory $btuFactory,
        BtuInterfaceFactory $dataBtuFactory,
        BtuCollectionFactory $btuCollectionFactory,
        BtuSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->btuFactory = $btuFactory;
        $this->btuCollectionFactory = $btuCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBtuFactory = $dataBtuFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Acton\Calculator\Api\Data\BtuInterface $btu
    ) {
        /* if (empty($btu->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $btu->setStoreId($storeId);
        } */
        
        $btuData = $this->extensibleDataObjectConverter->toNestedArray(
            $btu,
            [],
            \Acton\Calculator\Api\Data\BtuInterface::class
        );
        
        $btuModel = $this->btuFactory->create()->setData($btuData);
        
        try {
            $this->resource->save($btuModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the btu: %1',
                $exception->getMessage()
            ));
        }
        return $btuModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($btuId)
    {
        $btu = $this->btuFactory->create();
        $this->resource->load($btu, $btuId);
        if (!$btu->getId()) {
            throw new NoSuchEntityException(__('Btu with id "%1" does not exist.', $btuId));
        }
        return $btu->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->btuCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Acton\Calculator\Api\Data\BtuInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Acton\Calculator\Api\Data\BtuInterface $btu
    ) {
        try {
            $btuModel = $this->btuFactory->create();
            $this->resource->load($btuModel, $btu->getBtuId());
            $this->resource->delete($btuModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Btu: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($btuId)
    {
        return $this->delete($this->getById($btuId));
    }
}
