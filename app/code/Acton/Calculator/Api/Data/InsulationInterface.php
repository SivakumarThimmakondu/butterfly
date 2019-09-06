<?php


namespace Acton\Calculator\Api\Data;

interface InsulationInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const INSULATION_GRADE = 'insulation_grade';
    const INSULATION_VALUE = 'insulation_value';
    const INSULATION_ID = 'insulation_id';

    /**
     * Get insulation_id
     * @return string|null
     */
    public function getInsulationId();

    /**
     * Set insulation_id
     * @param string $insulationId
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationId($insulationId);

    /**
     * Get insulation_grade
     * @return string|null
     */
    public function getInsulationGrade();

    /**
     * Set insulation_grade
     * @param string $insulationGrade
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationGrade($insulationGrade);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\InsulationExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\InsulationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\InsulationExtensionInterface $extensionAttributes
    );

    /**
     * Get insulation_value
     * @return string|null
     */
    public function getInsulationValue();

    /**
     * Set insulation_value
     * @param string $insulationValue
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     */
    public function setInsulationValue($insulationValue);
}
