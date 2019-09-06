<?php


namespace Acton\Calculator\Api\Data;

interface BtuSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Btu list.
     * @return \Acton\Calculator\Api\Data\BtuInterface[]
     */
    public function getItems();

    /**
     * Set btu_area_min list.
     * @param \Acton\Calculator\Api\Data\BtuInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
