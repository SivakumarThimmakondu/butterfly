<?php


namespace Acton\Calculator\Api\Data;

interface PowertonInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const POWER_BTU_HOUR = 'power_btu_hour';
    const POWER_TON = 'power_ton';
    const POWERTON_ID = 'powerton_id';

    /**
     * Get powerton_id
     * @return string|null
     */
    public function getPowertonId();

    /**
     * Set powerton_id
     * @param string $powertonId
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowertonId($powertonId);

    /**
     * Get power_ton
     * @return string|null
     */
    public function getPowerTon();

    /**
     * Set power_ton
     * @param string $powerTon
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowerTon($powerTon);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\PowertonExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\PowertonExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\PowertonExtensionInterface $extensionAttributes
    );

    /**
     * Get power_btu_hour
     * @return string|null
     */
    public function getPowerBtuHour();

    /**
     * Set power_btu_hour
     * @param string $powerBtuHour
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     */
    public function setPowerBtuHour($powerBtuHour);
}
