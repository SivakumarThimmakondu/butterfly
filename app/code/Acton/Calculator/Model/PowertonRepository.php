<?php


namespace Acton\Calculator\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Acton\Calculator\Api\PowertonRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Acton\Calculator\Api\Data\PowertonInterfaceFactory;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Acton\Calculator\Api\Data\PowertonSearchResultsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Acton\Calculator\Model\ResourceModel\Powerton as ResourcePowerton;
use Acton\Calculator\Model\ResourceModel\Powerton\CollectionFactory as PowertonCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class PowertonRepository implements PowertonRepositoryInterface
{

    protected $powertonCollectionFactory;

    protected $dataObjectHelper;

    protected $resource;

    protected $dataPowertonFactory;

    private $collectionProcessor;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;

    protected $powertonFactory;


    /**
     * @param ResourcePowerton $resource
     * @param PowertonFactory $powertonFactory
     * @param PowertonInterfaceFactory $dataPowertonFactory
     * @param PowertonCollectionFactory $powertonCollectionFactory
     * @param PowertonSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourcePowerton $resource,
        PowertonFactory $powertonFactory,
        PowertonInterfaceFactory $dataPowertonFactory,
        PowertonCollectionFactory $powertonCollectionFactory,
        PowertonSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->powertonFactory = $powertonFactory;
        $this->powertonCollectionFactory = $powertonCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPowertonFactory = $dataPowertonFactory;
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
        \Acton\Calculator\Api\Data\PowertonInterface $powerton
    ) {
        /* if (empty($powerton->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $powerton->setStoreId($storeId);
        } */
        
        $powertonData = $this->extensibleDataObjectConverter->toNestedArray(
            $powerton,
            [],
            \Acton\Calculator\Api\Data\PowertonInterface::class
        );
        
        $powertonModel = $this->powertonFactory->create()->setData($powertonData);
        
        try {
            $this->resource->save($powertonModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the powerton: %1',
                $exception->getMessage()
            ));
        }
        return $powertonModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($powertonId)
    {
        $powerton = $this->powertonFactory->create();
        $this->resource->load($powerton, $powertonId);
        if (!$powerton->getId()) {
            throw new NoSuchEntityException(__('Powerton with id "%1" does not exist.', $powertonId));
        }
        return $powerton->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->powertonCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Acton\Calculator\Api\Data\PowertonInterface::class
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
        \Acton\Calculator\Api\Data\PowertonInterface $powerton
    ) {
        try {
            $powertonModel = $this->powertonFactory->create();
            $this->resource->load($powertonModel, $powerton->getPowertonId());
            $this->resource->delete($powertonModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Powerton: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($powertonId)
    {
        return $this->delete($this->getById($powertonId));
    }
}
