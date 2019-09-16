<?php


namespace Acton\Calculator\Model;

use Acton\Calculator\Api\Data\BtuInterfaceFactory;
use Acton\Calculator\Api\Data\BtuInterface;
use Magento\Framework\Api\DataObjectHelper;

class Btu extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'acton_calculator_btu';
    protected $dataObjectHelper;

    protected $btuDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BtuInterfaceFactory $btuDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Acton\Calculator\Model\ResourceModel\Btu $resource
     * @param \Acton\Calculator\Model\ResourceModel\Btu\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BtuInterfaceFactory $btuDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Acton\Calculator\Model\ResourceModel\Btu $resource,
        \Acton\Calculator\Model\ResourceModel\Btu\Collection $resourceCollection,
        array $data = []
    ) {
        $this->btuDataFactory = $btuDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve btu model with btu data
     * @return BtuInterface
     */
    public function getDataModel()
    {
        $btuData = $this->getData();
        
        $btuDataObject = $this->btuDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $btuDataObject,
            $btuData,
            BtuInterface::class
        );
        
        return $btuDataObject;
    }

    public function getBtudetails($lbh){
        //echo $lbh . '<br>';
        //exit;

       

        $btudetails=$this->getCollection()->addFieldToFilter('btu_area_min',
                                                             array(
                                                              array('gteq' => $lbh),
                                                              array('null' => true),
                                                            )
                                                           )
                                            ->addFieldToFilter('btu_area_max',
                                                             array(
                                                              array('gteq' => $lbh),
                                                              array('null' => true),
                                                            )
                                                           );

       /* $btudetails=$this->getCollection()->addFieldToFilter('btu_area_min', array('gteq' => 1499))->setPageSize(1);  */                                                
        

            //'btu_area_min', array('gteq' => $lbh))->setPageSize(1);
      // echo "<pre>";
      //print_r($btudetails->getData());
      // echo '</pre>';
        foreach($btudetails as $btudetails){
                return $btudetails['btu_hours'] ;   
        }

       // exit;

    }
}
