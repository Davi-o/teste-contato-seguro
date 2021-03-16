<?php


namespace Model;


use Domain\Contact;

class ContactCategoryModel implements Model
{
    private Contact $contact;

    /**
     * ContactCategoryModel constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
    }

    public function getAll(): string
    {
        // TODO: Implement getAll() method.
    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }
}