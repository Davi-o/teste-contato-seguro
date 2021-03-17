<?php

namespace Repository;

use Domain\Contact;

/**
 * Interface ContactRepository
 * @package Repository
 */
interface ContactRepository
{
    /**
     * @param Contact $userData
     * @return bool
     */
    public static function insertNewContact(Contact $userData): bool;

    /**
     * @return mixed
     */
    public static function getContactData();

    /**
     * @param $contactId
     * @return bool
     */
    public static function deleteContact($contactId): bool;
}