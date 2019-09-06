<?php


namespace Acton\Calculator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BtuRepositoryInterface
{

    /**
     * Save Btu
     * @param \Acton\Calculator\Api\Data\BtuInterface $btu
     * @return \Acton\Calculator\Api\Data\BtuInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Acton\Calculator\Api\Data\BtuInterface $btu
    );

    /**
     * Retrieve Btu
     * @param string $btuId
     * @return \Acton\Calculator\Api\Data\BtuInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($btuId);

    /**
     * Retrieve Btu matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Acton\Calculator\Api\Data\BtuSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Btu
     * @param \Acton\Calculator\Api\Data\BtuInterface $btu
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Acton\Calculator\Api\Data\BtuInterface $btu
    );

    /**
     * Delete Btu by ID
     * @param string $btuId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($btuId);
}
