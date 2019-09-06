<?php


namespace Acton\Calculator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PowertonRepositoryInterface
{

    /**
     * Save Powerton
     * @param \Acton\Calculator\Api\Data\PowertonInterface $powerton
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Acton\Calculator\Api\Data\PowertonInterface $powerton
    );

    /**
     * Retrieve Powerton
     * @param string $powertonId
     * @return \Acton\Calculator\Api\Data\PowertonInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($powertonId);

    /**
     * Retrieve Powerton matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Acton\Calculator\Api\Data\PowertonSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Powerton
     * @param \Acton\Calculator\Api\Data\PowertonInterface $powerton
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Acton\Calculator\Api\Data\PowertonInterface $powerton
    );

    /**
     * Delete Powerton by ID
     * @param string $powertonId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($powertonId);
}
