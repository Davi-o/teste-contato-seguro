<?php

namespace Controller;

use Formatter\ContactFormatter;
use \Model\ContactModel;

class ContactController
{
    public function createContactData($contactData): bool
    {
        $contact = new ContactFormatter($contactData);
        $contact = $contact->formatContactData();
        return $contact->save();
    }

    public function getAllContacts(): string
    {
        $contact = new ContactModel();
        return $contact->getAll();
    }

    public function deleteContact($contactId): bool
    {
        $contact = new ContactModel();
        return $contact->delete($contactId);
    }
}