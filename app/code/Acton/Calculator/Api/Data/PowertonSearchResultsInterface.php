<?php


namespace Acton\Calculator\Api\Data;

interface PowertonSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Powerton list.
     * @return \Acton\Calculator\Api\Data\PowertonInterface[]
     */
    public function getItems();

    /**
     * Set power_ton list.
     * @param \Acton\Calculator\Api\Data\PowertonInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
