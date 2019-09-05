<?php
namespace Butterfly\Mssr\Model;

class Config extends \Magento\Catalog\Model\Config
{
    public function getAttributeUsedForSortByArray()
    {
       $options = ['bestseller' => __('Best Seller'), 'newest' => __('Newest'), 'mostviewed' => __('Most Viewed')];
        foreach ($this->getAttributesUsedForSortBy() as $attribute) {
            /* @var $attribute \Magento\Eav\Model\Entity\Attribute\AbstractAttribute */
            $options[$attribute->getAttributeCode()] = $attribute->getStoreLabel();
        }

       return $options;
    }
}