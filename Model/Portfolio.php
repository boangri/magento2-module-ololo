<?php
namespace Boangri\Ololo\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Boangri\Ololo\Api\Data\ProjectInterface;

/**
 * Class File
 * @package Boangri\Ololo\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Portfolio extends AbstractModel implements ProjectInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'boangri_portfolio';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Boangri\Ololo\Model\ResourceModel\Portfolio');
    }


    /**
     * Get Year
     *
     * @return string|null
     */
    public function getYear()
    {
        return $this->getData(self::YEAR);
    }

    /**
     * Get Site
     *
     * @return string|null
     */
    public function getSite()
    {
        return $this->getData(self::SITE);
    }

    /**
     * Get Description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Set Year
     *
     * @param string $year
     * @return $this
     */
    public function setYear($year)
    {
        return $this->setData(self::YEAR, $year);
    }

    /**
     * Set Site
     *
     * @param string $site
     * @return $this
     */
    public function setSite($site)
    {
        return $this->setData(self::SITE, $site);
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }
}
