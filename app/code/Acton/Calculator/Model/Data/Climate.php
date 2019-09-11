<?php


namespace Acton\Calculator\Model\Data;

use Acton\Calculator\Api\Data\ClimateInterface;

class Climate extends \Magento\Framework\Api\AbstractExtensibleObject implements ClimateInterface
{

    /**
     * Get climate_id
     * @return string|null
     */
    public function getClimateId()
    {
        return $this->_get(self::CLIMATE_ID);
    }

    /**
     * Set climate_id
     * @param string $climateId
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setClimateId($climateId)
    {
        return $this->setData(self::CLIMATE_ID, $climateId);
    }

    /**
     * Get house_age
     * @return string|null
     */
    public function getHouseAge()
    {
        return $this->_get(self::HOUSE_AGE);
    }

    /**
     * Set house_age
     * @param string $houseAge
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setHouseAge($houseAge)
    {
        return $this->setData(self::HOUSE_AGE, $houseAge);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\ClimateExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\ClimateExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\ClimateExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get climate
     * @return string|null
     */
    public function getClimate()
    {
        return $this->_get(self::CLIMATE);
    }

    /**
     * Set climate
     * @param string $climate
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setClimate($climate)
    {
        return $this->setData(self::CLIMATE, $climate);
    }
}
