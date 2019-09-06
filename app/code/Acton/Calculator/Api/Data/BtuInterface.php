<?php


namespace Acton\Calculator\Api\Data;

interface BtuInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const BTU_HOURS = 'btu_hours';
    const BTU_ID = 'btu_id';
    const BTU_AREA_MIN = 'btu_area_min';
    const BTU_AREA_MAX = 'btu_area_max';

    /**
     * Get btu_id
     * @return string|null
     */
    public function getBtuId();

    /**
     * Set btu_id
     * @param string $btuId
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuId($btuId);

    /**
     * Get btu_area_min
     * @return string|null
     */
    public function getBtuAreaMin();

    /**
     * Set btu_area_min
     * @param string $btuAreaMin
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuAreaMin($btuAreaMin);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Acton\Calculator\Api\Data\BtuExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Acton\Calculator\Api\Data\BtuExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Acton\Calculator\Api\Data\BtuExtensionInterface $extensionAttributes
    );

    /**
     * Get btu_area_max
     * @return string|null
     */
    public function getBtuAreaMax();

    /**
     * Set btu_area_max
     * @param string $btuAreaMax
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuAreaMax($btuAreaMax);

    /**
     * Get btu_hours
     * @return string|null
     */
    public function getBtuHours();

    /**
     * Set btu_hours
     * @param string $btuHours
     * @return \Acton\Calculator\Api\Data\BtuInterface
     */
    public function setBtuHours($btuHours);
}
