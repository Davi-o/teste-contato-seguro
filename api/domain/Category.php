<?php


namespace Domain;


/**
 * Class Category
 * @package Domain
 */
class Category
{
    /**
     * @var int
     */
    private int $contactId;
    /**
     * @var int
     */
    private int $categoryId;

    /**
     * Category constructor.
     * @param $contactId
     * @param $categoryId
     */
    public function __construct($contactId, $categoryId)
    {
        $this->contactId = $contactId;
        $this->categoryId = $categoryId;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }


}