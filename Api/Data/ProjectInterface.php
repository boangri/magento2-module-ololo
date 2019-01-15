<?php

namespace Boangri\Ololo\Api\Data;

interface ProjectInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const YEAR                  = 'year';
    const SITE                  = 'site';
    const DESCRIPTION           = 'description';
    const CREATED_AT            = 'created_at';
    /**#@-*/

    /**
     * Get Year
     *
     * @return string|null
     */
    public function getYear();

    /**
     * Get Site
     *
     * @return string|null
     */
    public function getSite();

    /**
     * Get Description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Year
     *
     * @param string $year
     * @return $this
     */
    public function setYear($year);

    /**
     * Set Site
     *
     * @param string $site
     * @return $this
     */
    public function setSite($site);

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
}
