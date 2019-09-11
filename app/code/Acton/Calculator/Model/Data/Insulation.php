<?php


namespace Acton\Calculator\Model\Data;

use Acton\Calculator\Api\Data\InsulationInterface;

class Insulation extends \Magento\Framework\Api\AbstractExtensibleObject implements InsulationInterface
{

    /**
     * Get insulation_id
     * @return string|null
     */
    public function getInsulationId()
    {
        return $this->_get(self::INSULATION_ID);
    }

    /**
     * Set insulation_id
     * @param string $insulationId
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationId($insulationId)
    {
        return $this->setData(self::INSULATION_ID, $insulationId);
    }

    /**
     * Get insulation_grade
     * @return string|null
     */
    public function getInsulationGrade()
    {
        return $this->_get(self::INSULATION_GRADE);
    }

    /**
     * Set insulation_grade
     * @param string $insulationGrade
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationGrade($insulationGrade)
    {
        return $this->setData(self::INSULATION_GRADE, $insulationGrade);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\InsulationExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\InsulationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\InsulationExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get insulation_value
     * @return string|null
     */
    public function getInsulationValue()
    {
        return $this->_get(self::INSULATION_VALUE);
    }

    /**
     * Set insulation_value
     * @param string $insulationValue
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationValue($insulationValue)
    {
        return $this->setData(self::INSULATION_VALUE, $insulationValue);
    }
}
