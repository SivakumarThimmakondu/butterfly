<?php


namespace Acton\Calculator\Model\ResourceModel;

class Climate extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('acton_calculator_climate', 'climate_id');
    }
}
