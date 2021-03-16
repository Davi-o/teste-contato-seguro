<?php


namespace Domain;


class ContactCategory
{
    private int $id;
    private int $contactId;
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