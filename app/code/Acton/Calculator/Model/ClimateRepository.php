<?php


namespace Acton\Calculator\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Acton\Calculator\Api\Data\ClimateSearchResultsInterfaceFactory;
use Acton\Calculator\Api\ClimateRepositoryInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\DataObjectHelper;
use Acton\Calculator\Model\ResourceModel\Climate\CollectionFactory as ClimateCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Acton\Calculator\Api\Data\ClimateInterfaceFactory;
use Acton\Calculator\Model\ResourceModel\Climate as ResourceClimate;
use Magento\Framework\Exception\NoSuchEntityException;

class ClimateRepository implements ClimateRepositoryInterface
{

    protected $dataClimateFactory;

    protected $climateFactory;

    protected $dataObjectHelper;

    protected $resource;

    protected $climateCollectionFactory;

    private $collectionProcessor;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;


    /**
     * @param ResourceClimate $resource
     * @param ClimateFactory $climateFactory
     * @param ClimateInterfaceFactory $dataClimateFactory
     * @param ClimateCollectionFactory $climateCollectionFactory
     * @param ClimateSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceClimate $resource,
        ClimateFactory $climateFactory,
        ClimateInterfaceFactory $dataClimateFactory,
        ClimateCollectionFactory $climateCollectionFactory,
        ClimateSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->climateFactory = $climateFactory;
        $this->climateCollectionFactory = $climateCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataClimateFactory = $dataClimateFactory;
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
        \Acton\Calculator\Api\Data\ClimateInterface $climate
    ) {
        /* if (empty($climate->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $climate->setStoreId($storeId);
        } */
        
        $climateData = $this->extensibleDataObjectConverter->toNestedArray(
            $climate,
            [],
            \Acton\Calculator\Api\Data\ClimateInterface::class
        );
        
        $climateModel = $this->climateFactory->create()->setData($climateData);
        
        try {
            $this->resource->save($climateModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the climate: %1',
                $exception->getMessage()
            ));
        }
        return $climateModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($climateId)
    {
        $climate = $this->climateFactory->create();
        $this->resource->load($climate, $climateId);
        if (!$climate->getId()) {
            throw new NoSuchEntityException(__('Climate with id "%1" does not exist.', $climateId));
        }
        return $climate->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->climateCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Acton\Calculator\Api\Data\ClimateInterface::class
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
        \Acton\Calculator\Api\Data\ClimateInterface $climate
    ) {
        try {
            $climateModel = $this->climateFactory->create();
            $this->resource->load($climateModel, $climate->getClimateId());
            $this->resource->delete($climateModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Climate: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($climateId)
    {
        return $this->delete($this->getById($climateId));
    }
}
