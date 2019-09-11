<?php


namespace Acton\Calculator\Model\Data;

use Acton\Calculator\Api\Data\PowertonInterface;

class Powerton extends \Magento\Framework\Api\AbstractExtensibleObject implements PowertonInterface
{

    /**
     * Get powerton_id
     * @return string|null
     */
    public function getPowertonId()
    {
        return $this->_get(self::POWERTON_ID);
    }

    /**
     * Set powerton_id
     * @param string $powertonId
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowertonId($powertonId)
    {
        return $this->setData(self::POWERTON_ID, $powertonId);
    }

    /**
     * Get power_ton
     * @return string|null
     */
    public function getPowerTon()
    {
        return $this->_get(self::POWER_TON);
    }

    /**
     * Set power_ton
     * @param string $powerTon
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowerTon($powerTon)
    {
        return $this->setData(self::POWER_TON, $powerTon);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\PowertonExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\PowertonExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\PowertonExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get power_btu_hour
     * @return string|null
     */
    public function getPowerBtuHour()
    {
        return $this->_get(self::POWER_BTU_HOUR);
    }

    /**
     * Set power_btu_hour
     * @param string $powerBtuHour
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowerBtuHour($powerBtuHour)
    {
        return $this->setData(self::POWER_BTU_HOUR, $powerBtuHour);
    }
}
