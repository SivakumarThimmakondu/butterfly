<?php


namespace Acton\Calculator\Model\ResourceModel;

class Btu extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('acton_calculator_btu', 'btu_id');
    }
}
