<?php


namespace Acton\Calculator\Api\Data;

interface ClimateInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CLIMATE_ID = 'climate_id';
    const CLIMATE = 'climate';
    const HOUSE_AGE = 'house_age';

    /**
     * Get climate_id
     * @return string|null
     */
    public function getClimateId();

    /**
     * Set climate_id
     * @param string $climateId
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setClimateId($climateId);

    /**
     * Get house_age
     * @return string|null
     */
    public function getHouseAge();

    /**
     * Set house_age
     * @param string $houseAge
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setHouseAge($houseAge);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\ClimateExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\ClimateExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\ClimateExtensionInterface $extensionAttributes
    );

    /**
     * Get climate
     * @return string|null
     */
    public function getClimate();

    /**
     * Set climate
     * @param string $climate
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     */
    public function setClimate($climate);
}
