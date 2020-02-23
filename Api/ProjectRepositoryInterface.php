<?php

namespace Boangri\Ololo\Api;

use Boangri\Ololo\Api\Data\ProjectSearchResultsInterface;
use Boangri\Ololo\Api\Data\ProjectInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface ProjectRepositoryInterface
{
    /**
     * Create or update a project.
     *
     * @throws InputException If bad input is provided
     * @throws LocalizedException
     * @param ProjectInterface $project
     */
    public function save(ProjectInterface $project);

    /**
     * Get customer by Customer ID.
     *
     * @param int $projectId
     * @return ProjectInterface
     * @throws NoSuchEntityException If project with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById($projectId);

    /**
     * Retrieve projects which match a specified criteria.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     * included.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ProjectSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete project.
     *
     * @param ProjectInterface $project
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(ProjectInterface $project);

    /**
     * Delete customer by Customer ID.
     *
     * @param int $projectId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($projectId);
}
