<?php

namespace Domain;

/**
 * Class ContactCategory
 * @package Domain
 */
class ContactCategory
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var int
     */
    private int $contactId;
    /**
     * @var int
     */
    private int $categoryId;

    /**
     * ContactCategory constructor.
     * @param int $id
     * @param int $contactId
     * @param int $categoryId
     */
    public function __construct(int $id, int $contactId, int $categoryId)
    {
        $this->id = $id;
        $this->contactId = $contactId;
        $this->categoryId = $categoryId;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }


}