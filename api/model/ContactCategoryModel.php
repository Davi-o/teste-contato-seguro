<?php


namespace Model;


use Domain\Contact;

/**
 * Class ContactCategoryModel
 * @package Model
 */
class ContactCategoryModel implements Model
{
    /**
     * @var Contact
     */
    private Contact $contact;

    /**
     * ContactCategoryModel constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        // TODO: Implement save() method.
    }

    /**
     * @return string
     */
    public function getAll(): string
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }
}