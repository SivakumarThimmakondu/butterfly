<?php


namespace Acton\Calculator\Model\ResourceModel;

class Powerton extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('acton_calculator_powerton', 'powerton_id');
    }
}
