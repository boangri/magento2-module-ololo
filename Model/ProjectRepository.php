<?php

namespace Boangri\Ololo\Model;

use Boangri\Ololo\Api\Data\ProjectInterface;
use Boangri\Ololo\Api\ProjectRepositoryInterface;
use Boangri\Ololo\Model\ResourceModel\Portfolio\CollectionFactory;
use Magento\Framework\Api\SearchResultsInterface;
use Boangri\Ololo\Model\PortfolioFactory as ProjectFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

class ProjectRepository implements ProjectRepositoryInterface
{
    /**
     * @var ResourceModel\Portfolio
     */
    private $resourceModel;
    /**
     * @var ProjectFactory
     */
    private $projectFactory;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        ResourceModel\Portfolio $resourceModel,
        ProjectFactory $projectFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->projectFactory = $projectFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function save(ProjectInterface $project)
    {
        $this->resourceModel->save($project);
    }

    public function getById($projectId)
    {
        $project = $this->projectFactory->create();
        $this->resourceModel->load($project, $projectId);
        if (!$project->getId()) {
            throw new NoSuchEntityException(__('Project with id "%1" does not exist.', $projectId));
        }
        return $project;
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var SearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $collection = $this->collectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);
        return $searchResults;
    }

    public function deleteById($projectId)
    {
        $this->resourceModel->delete($this->getById($projectId));
    }

    public function delete(ProjectInterface $project)
    {
        $this->resourceModel->delete($project);
    }
}
