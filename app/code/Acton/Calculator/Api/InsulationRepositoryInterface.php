<?php


namespace Acton\Calculator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface InsulationRepositoryInterface
{

    /**
     * Save Insulation
     * @param \Acton\Calculator\Api\Data\InsulationInterface $insulation
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Acton\Calculator\Api\Data\InsulationInterface $insulation
    );

    /**
     * Retrieve Insulation
     * @param string $insulationId
     * @return \Acton\Calculator\Api\Data\InsulationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($insulationId);

    /**
     * Retrieve Insulation matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Acton\Calculator\Api\Data\InsulationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Insulation
     * @param \Acton\Calculator\Api\Data\InsulationInterface $insulation
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Acton\Calculator\Api\Data\InsulationInterface $insulation
    );

    /**
     * Delete Insulation by ID
     * @param string $insulationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($insulationId);
}
