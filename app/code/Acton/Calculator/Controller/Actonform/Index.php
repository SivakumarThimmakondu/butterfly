<?php

namespace Acton\Calculator\Controller\Actonform;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
     protected $_scopeConfig;
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

    /**        $result = $this->resultJsonFactory->create();
        if ($this->getRequest()->isAjax()) 
        {
            $test=Array
            (
                'Firstname' => 'What is your firstname',
                'Email' => 'What is your emailId',
                'Lastname' => 'What is your lastname',
                'Country' => 'Your Country'
            );
            return $result->setData($test);
        }
     * Index action
     *
     * @return void
     */
    public function execute()
    {
  
        // 1. POST request : Get booking data
        $post = (array) $this->getRequest()->getPost();
       


        
       
        //exit;

        //print_r($post);
        //exit;


        if (!empty($post)) {


        $result = $this->resultJsonFactory->create();
        if ($this->getRequest()->isAjax()) 
        {
            $test=Array
            (
                'Firstname' => 'What is your firstname',
                'Email' => 'What is your emailId',
                'Lastname' => 'What is your lastname',
                'Country' => 'Your Country'
            );
            return $result->setData($test);
        }


            // Retrieve your form data
            $length   = $post['length'];
            $breadth    = $post['breadth'];
            $height       = $post['height'];
            $insulation   = $post['insulation'];
            $houseage    = $post['houseage'];
            $climate       = $post['climate'];
            $noofpeople       = $post['noofpeople'];

           // print_r($post);
           $lb = $length*$breadth;
           if($lb <= '300')
           {

           echo $lbh=$length*$breadth*$height;
            //echo $lbh;
           echo 'BTU ' . $getbtuhours=$this->btuFactory->getBtudetails($lbh). '<br>';

           echo 'Insulation ' . $insulationhours=$this->insulationFactory->getInsulationdetails($getbtuhours,$insulation). '<br>';

           echo 'Climate '. $climatehours=$this->climateFactory->getClimatedetails($insulationhours,$houseage,$climate). '<br>';

           $populationvalue = $this->_scopeConfig->getValue('calculator/general/population_btu', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

           if($noofpeople>2)
           {
            $remainingpeople = $noofpeople-2;
            $additionalpeoplevalue = $remainingpeople * 600;
            echo $finalval = floatval($climatehours) + $additionalpeoplevalue;
          }
          else 
          {
            echo $finalval = "$climatehours";
          }

           

           echo 'Powerton '. $powertonhours=$this->powertonFactory->getPowertondetails($finalval). '<br>';
          }

          else
          {
            echo 'Not exceed more than 300';
          }
            //exit;
            // Doing-something with...

            // Display the succes form validation message
           //$this->messageManager->addSuccessMessage('Booking done !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->_resultPageFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/actn/actonform/index');

            return $Powerton;
        }
        // 2. GET request : Render the booking page 
       $resultPage = $this->_resultPageFactory->create();
       $resultPage->addHandle('acton_calculator_actonform_index'); //loads the layout of module_custom_customlayout.xml file with its name
       return $resultPage;
    }
}