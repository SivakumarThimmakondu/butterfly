<?php
namespace Butterfly\Megamenu\Block;
class Categorylist extends \Magento\Framework\View\Element\Template
{    
    protected $_categoryHelper;
    protected $categoryFactory;
    protected $_catalogLayer;
    protected $_categoryRepository;


    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,     
        \Magento\Catalog\Helper\Category $categoryHelper,        
    \Magento\Catalog\Model\CategoryRepository $categoryRepository,        

        array $data = []
    ) {


        $this->_categoryHelper = $categoryHelper;   
    $this->_categoryRepository = $categoryRepository;
        parent::__construct(
            $context,          
            $data
        );


    }

    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
    }

    public function getCategoryById($categoryId) 
    {
        return $this->_categoryRepository->get($categoryId);

    }


}