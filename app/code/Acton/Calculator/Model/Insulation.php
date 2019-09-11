<?php


namespace Acton\Calculator\Model;

use Magento\Framework\Api\DataObjectHelper;
use Acton\Calculator\Api\Data\InsulationInterface;
use Acton\Calculator\Api\Data\InsulationInterfaceFactory;

class Insulation extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'acton_calculator_insulation';
    protected $insulationDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param InsulationInterfaceFactory $insulationDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Acton\Calculator\Model\ResourceModel\Insulation $resource
     * @param \Acton\Calculator\Model\ResourceModel\Insulation\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        InsulationInterfaceFactory $insulationDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Acton\Calculator\Model\ResourceModel\Insulation $resource,
        \Acton\Calculator\Model\ResourceModel\Insulation\Collection $resourceCollection,
        array $data = []
    ) {
        $this->insulationDataFactory = $insulationDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve insulation model with insulation data
     * @return InsulationInterface
     */
    public function getDataModel()
    {
        $insulationData = $this->getData();
        
        $insulationDataObject = $this->insulationDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $insulationDataObject,
            $insulationData,
            InsulationInterface::class
        );
        
        return $insulationDataObject;
    }


     public function getInsulationdetails($getbtuhours, $insulation){
        //echo $getbtuhours;
       // echo $insulation;
        //exit;
        $insulationdetails=$this->getCollection()->addFieldToFilter('insulation_grade',array('eq'=>$insulation))->setPageSize(1);                                    
        

       
      //echo "<pre>";
      //print_r($insulationdetails->getData());
      //echo '</pre>';


      //exit;

      
        foreach($insulationdetails as $insulationdetails){

           if($insulationdetails['insulation_grade']='poor')
           {
            
            $insulationvalue = $insulationdetails['insulation_value'];
            $insulationpercentage = $insulationvalue/100;

            $insulationfactorpercentage = floatval($getbtuhours) * $insulationpercentage;

            $insulationfactor = floatval($getbtuhours) + $insulationfactorpercentage;


           }
           else
           {
             $insulationfactor = $getbtuhours;

           }
           return $insulationfactor;  
        }

        //exit;

    }
}
