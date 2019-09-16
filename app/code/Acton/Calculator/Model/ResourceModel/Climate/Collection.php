<?php


namespace Acton\Calculator\Model\ResourceModel\Climate;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Acton\Calculator\Model\Climate::class,
            \Acton\Calculator\Model\ResourceModel\Climate::class
        );
    }
}
