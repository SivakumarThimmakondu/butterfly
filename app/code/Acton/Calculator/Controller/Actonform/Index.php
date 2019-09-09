<?php

namespace Acton\Calculator\Controller\Actonform;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
     protected $_scopeConfig;
     protected $resultJsonFactory;
     public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Acton\Calculator\Model\Btu $btuFactory,
        \Acton\Calculator\Model\Insulation $insulationFactory,
        \Acton\Calculator\Model\Climate $climateFactory,
        \Acton\Calculator\Model\Powerton $powertonFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
        
    ) {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
        $this->_resultPageFactory = $resultPageFactory;
        $this->btuFactory= $btuFactory;
        $this->insulationFactory= $insulationFactory;
        $this->climateFactory= $climateFactory;
        $this->powertonFactory= $powertonFactory;
        $this->resultJsonFactory = $resultJsonFactory;

    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
  
        // 1. POST request : Get booking data
       $post = (array) $this->getRequest()->getPost();
       
       //print_r($post);
       //exit;


        if (!empty($post)) {

            // Retrieve your form data
            $length   = $post['length'];
            $breadth    = $post['breadth'];
            $height       = $post['height'];
            $insulation   = $post['insulation'];
            $houseage    = $post['houseage'];
            $climate       = $post['climate'];
            $noofpeople       = $post['noofpeople'];

           $lbh=$length*$breadth*$height;
           $getbtuhours=$this->btuFactory->getBtudetails($lbh);
           $insulationhours=$this->insulationFactory->getInsulationdetails($getbtuhours,$insulation);
           $climatehours=$this->climateFactory->getClimatedetails($insulationhours,$houseage,$climate);
           $populationvalue = $this->_scopeConfig->getValue('calculator/general/population_btu', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

           if($noofpeople>2)
           {
            
            $remainingpeople = $noofpeople-2;
            $additionalpeoplevalue = $remainingpeople * 600;
            $finalval = floatval($climatehours) + $additionalpeoplevalue;
          }
          else 
          {
            $finalval = "$climatehours";
          }

           

          $powertonhours=$this->powertonFactory->getPowertondetails($finalval);
          $resultJson = $this->resultJsonFactory->create();
          $response = $powertonhours;
          $resultJson->setData($response);
          return $resultJson;
            //exit;
            // Doing-something with...

            // Display the succes form validation message
           // $this->messageManager->addSuccessMessage('Booking done !');

            // Redirect to your form page (or anywhere you want...)
           // $resultRedirect = $this->_resultPageFactory->create(ResultFactory::TYPE_REDIRECT);
            //$resultRedirect->setUrl('/actn/actonform/index');

           // return $resultRedirect;
        }
        // 2. GET request : Render the booking page 
       $resultPage = $this->_resultPageFactory->create();
       $resultPage->addHandle('acton_calculator_actonform_index'); //loads the layout of module_custom_customlayout.xml file with its name
       //$response['result'] = $value;
       //echo json_encode($response);
     // exit;
       return $resultPage;
    }
}     