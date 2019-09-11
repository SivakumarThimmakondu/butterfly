<?php


namespace Acton\Calculator\Model;

use Acton\Calculator\Api\Data\ClimateInterfaceFactory;
use Acton\Calculator\Api\Data\ClimateInterface;
use Magento\Framework\Api\DataObjectHelper;

class Climate extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $climateDataFactory;

    protected $_eventPrefix = 'acton_calculator_climate';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ClimateInterfaceFactory $climateDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Acton\Calculator\Model\ResourceModel\Climate $resource
     * @param \Acton\Calculator\Model\ResourceModel\Climate\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ClimateInterfaceFactory $climateDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Acton\Calculator\Model\ResourceModel\Climate $resource,
        \Acton\Calculator\Model\ResourceModel\Climate\Collection $resourceCollection,
        array $data = []
    ) {
        $this->climateDataFactory = $climateDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve climate model with climate data
     * @return ClimateInterface
     */
    public function getDataModel()
    {
        $climateData = $this->getData();
        
        $climateDataObject = $this->climateDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $climateDataObject,
            $climateData,
            ClimateInterface::class
        );
        
        return $climateDataObject;
    }


    public function getClimatedetails($insulationhours,$houseage,$climate){
        /*echo $insulationhours;
        echo $houseage .'<br>';
        echo $climate;*/

        $climatedetails=$this->getCollection();

      /* echo "<pre>";
       print_r($climatedetails->getData());
       echo '</pre>'; */

      $climatedetails=$this->getCollection()->addFieldToFilter('house_age',
                                                                array('eq' => $houseage)
                                                              )
                                            ->addFieldToFilter('climate',
                                                                array('eq' => $climate)
                                                              )->setPageSize(1);

        foreach($climatedetails as $climatedetails){

                $climatevalue = $climatedetails['climate_btu_hours'];
                $climatefactor = floatval($insulationhours) + $climatevalue; 
                return $climatefactor;   
        }
   
   //exit;                                            

    }
}
