<?php


namespace Acton\Calculator\Model\Data;

use Acton\Calculator\Api\Data\BtuInterface;

class Btu extends \Magento\Framework\Api\AbstractExtensibleObject implements BtuInterface
{

    /**
     * Get btu_id
     * @return string|null
     */
    public function getBtuId()
    {
        return $this->_get(self::BTU_ID);
    }

    /**
     * Set btu_id
     * @param string $btuId
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuId($btuId)
    {
        return $this->setData(self::BTU_ID, $btuId);
    }

    /**
     * Get btu_area_min
     * @return string|null
     */
    public function getBtuAreaMin()
    {
        return $this->_get(self::BTU_AREA_MIN);
    }

    /**
     * Set btu_area_min
     * @param string $btuAreaMin
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuAreaMin($btuAreaMin)
    {
        return $this->setData(self::BTU_AREA_MIN, $btuAreaMin);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\BtuExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\BtuExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\BtuExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get btu_area_max
     * @return string|null
     */
    public function getBtuAreaMax()
    {
        return $this->_get(self::BTU_AREA_MAX);
    }

    /**
     * Set btu_area_max
     * @param string $btuAreaMax
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuAreaMax($btuAreaMax)
    {
        return $this->setData(self::BTU_AREA_MAX, $btuAreaMax);
    }

    /**
     * Get btu_hours
     * @return string|null
     */
    public function getBtuHours()
    {
        return $this->_get(self::BTU_HOURS);
    }

    /**
     * Set btu_hours
     * @param string $btuHours
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuHours($btuHours)
    {
        return $this->setData(self::BTU_HOURS, $btuHours);
    }
}
