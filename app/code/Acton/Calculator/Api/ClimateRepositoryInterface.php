<?php


namespace Acton\Calculator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ClimateRepositoryInterface
{

    /**
     * Save Climate
     * @param \Acton\Calculator\Api\Data\ClimateInterface $climate
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Acton\Calculator\Api\Data\ClimateInterface $climate
    );

    /**
     * Retrieve Climate
     * @param string $climateId
     * @return \Acton\Calculator\Api\Data\ClimateInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($climateId);

    /**
     * Retrieve Climate matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Acton\Calculator\Api\Data\ClimateSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Climate
     * @param \Acton\Calculator\Api\Data\ClimateInterface $climate
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Acton\Calculator\Api\Data\ClimateInterface $climate
    );

    /**
     * Delete Climate by ID
     * @param string $climateId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($climateId);
}
