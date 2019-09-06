<?php


namespace Acton\Calculator\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Acton\Calculator\Model\ResourceModel\Insulation as ResourceInsulation;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Acton\Calculator\Model\ResourceModel\Insulation\CollectionFactory as InsulationCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Acton\Calculator\Api\Data\InsulationSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Acton\Calculator\Api\InsulationRepositoryInterface;
use Acton\Calculator\Api\Data\InsulationInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class InsulationRepository implements InsulationRepositoryInterface
{

    protected $insulationCollectionFactory;

    protected $insulationFactory;

    protected $dataObjectHelper;

    protected $resource;

    protected $dataInsulationFactory;

    private $collectionProcessor;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;


    /**
     * @param ResourceInsulation $resource
     * @param InsulationFactory $insulationFactory
     * @param InsulationInterfaceFactory $dataInsulationFactory
     * @param InsulationCollectionFactory $insulationCollectionFactory
     * @param InsulationSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceInsulation $resource,
        InsulationFactory $insulationFactory,
        InsulationInterfaceFactory $dataInsulationFactory,
        InsulationCollectionFactory $insulationCollectionFactory,
        InsulationSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->insulationFactory = $insulationFactory;
        $this->insulationCollectionFactory = $insulationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataInsulationFactory = $dataInsulationFactory;
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
        \Acton\Calculator\Api\Data\InsulationInterface $insulation
    ) {
        /* if (empty($insulation->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $insulation->setStoreId($storeId);
        } */
        
        $insulationData = $this->extensibleDataObjectConverter->toNestedArray(
            $insulation,
            [],
            \Acton\Calculator\Api\Data\InsulationInterface::class
        );
        
        $insulationModel = $this->insulationFactory->create()->setData($insulationData);
        
        try {
            $this->resource->save($insulationModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the insulation: %1',
                $exception->getMessage()
            ));
        }
        return $insulationModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($insulationId)
    {
        $insulation = $this->insulationFactory->create();
        $this->resource->load($insulation, $insulationId);
        if (!$insulation->getId()) {
            throw new NoSuchEntityException(__('Insulation with id "%1" does not exist.', $insulationId));
        }
        return $insulation->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->insulationCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Acton\Calculator\Api\Data\InsulationInterface::class
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
        \Acton\Calculator\Api\Data\InsulationInterface $insulation
    ) {
        try {
            $insulationModel = $this->insulationFactory->create();
            $this->resource->load($insulationModel, $insulation->getInsulationId());
            $this->resource->delete($insulationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Insulation: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($insulationId)
    {
        return $this->delete($this->getById($insulationId));
    }
}
