<?php


namespace Acton\Calculator\Api\Data;

interface InsulationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Insulation list.
     * @return \Acton\Calculator\Api\Data\InsulationInterface[]
     */
    public function getItems();

    /**
     * Set insulation_grade list.
     * @param \Acton\Calculator\Api\Data\InsulationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
