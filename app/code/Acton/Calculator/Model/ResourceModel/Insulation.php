<?php


namespace Acton\Calculator\Model\ResourceModel;

class Insulation extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('acton_calculator_insulation', 'insulation_id');
    }
}
