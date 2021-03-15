<?php

namespace Repository;

use Domain\Contact;

interface ContactRepository
{
    public static function insertNewContact(Contact $userData): bool;
    public static function getContactData();
    public static function deleteContact($contactId): bool;
}