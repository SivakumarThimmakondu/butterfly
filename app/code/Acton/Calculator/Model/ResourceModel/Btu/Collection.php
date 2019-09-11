<?php


namespace Acton\Calculator\Model\ResourceModel\Btu;

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
            \Acton\Calculator\Model\Btu::class,
            \Acton\Calculator\Model\ResourceModel\Btu::class
        );
    }
}
