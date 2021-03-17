<?php

namespace Controller;

use Formatter\ContactFormatter;
use Formatter\RequestFormatter;
use \Model\ContactModel;
use Util\FormatRequest;

/**
 * Class ContactController
 * @package Controller
 */
class ContactController
{
    /**
     * @param $contactData
     * @return bool
     */
    public function createContactData($contactData): bool
    {
        $contactData = FormatRequest::getArrayFromJson($contactData);
        $contact = new ContactFormatter($contactData);
        $contact = $contact->formatContactData();
        return $contact->save();
    }

    /**
     * @return string
     */
    public function getAllContacts(): string
    {
        $contact = new ContactModel();
        return $contact->getAll();
    }

    /**
     * @param $contactId
     * @return bool
     */
    public function deleteContact($contactId): bool
    {
        $contact = new ContactModel();
        return $contact->delete($contactId);
    }
}