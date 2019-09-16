<?php


namespace Acton\Calculator\Api\Data;

interface ClimateSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Climate list.
     * @return \Acton\Calculator\Api\Data\ClimateInterface[]
     */
    public function getItems();

    /**
     * Set house_age list.
     * @param \Acton\Calculator\Api\Data\ClimateInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
