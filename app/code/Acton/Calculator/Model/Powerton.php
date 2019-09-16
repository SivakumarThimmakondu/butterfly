<?php


namespace Acton\Calculator\Model;

use Acton\Calculator\Api\Data\PowertonInterfaceFactory;
use Acton\Calculator\Api\Data\PowertonInterface;
use Magento\Framework\Api\DataObjectHelper;

class Powerton extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'acton_calculator_powerton';
    protected $powertonDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param PowertonInterfaceFactory $powertonDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Acton\Calculator\Model\ResourceModel\Powerton $resource
     * @param \Acton\Calculator\Model\ResourceModel\Powerton\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        PowertonInterfaceFactory $powertonDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Acton\Calculator\Model\ResourceModel\Powerton $resource,
        \Acton\Calculator\Model\ResourceModel\Powerton\Collection $resourceCollection,
        array $data = []
    ) {
        $this->powertonDataFactory = $powertonDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve powerton model with powerton data
     * @return PowertonInterface
     */
    public function getDataModel()
    {
        $powertonData = $this->getData();
        
        $powertonDataObject = $this->powertonDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $powertonDataObject,
            $powertonData,
            PowertonInterface::class
        );
        
        return $powertonDataObject;
    }

     public function getPowertondetails($finalval){
        

        $powertondetails=$this->getCollection();

      /*echo "<pre>";
       print_r($powertondetails->getData());
       echo '</pre>'; 
    exit;*/
      $powertondetails=$this->getCollection()->addFieldToFilter('power_btu_hour',
                                                                array('gteq' => $finalval)
                                                                )->setPageSize(1);

        foreach($powertondetails as $powertondetails){

               
                return $powertondetails['power_ton'];   
        }
   
   //exit;                                            

    }
}
