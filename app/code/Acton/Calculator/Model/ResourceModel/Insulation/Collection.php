<?php


namespace Acton\Calculator\Model\ResourceModel\Insulation;

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
            \Acton\Calculator\Model\Insulation::class,
            \Acton\Calculator\Model\ResourceModel\Insulation::class
        );
    }
}
