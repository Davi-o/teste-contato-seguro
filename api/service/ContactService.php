<?php

namespace Service;

use Domain\Contact;
use Repository\ContactRepository;

/**
 * Class ContactService
 * @package Service
 */
class ContactService extends Connection implements ContactRepository
{
    /**
     * @return false|mixed|\PDOStatement
     */
    public static function getContactData()
    {
        parent::connect();
        return parent::$connection->query("select * from contact");
    }

    /**
     * @param Contact $userData
     * @return bool
     */
    public static function insertNewContact(Contact $userData): bool
    {
        parent::connect();

        $sql = self::insertQuery($userData);

        $statement = parent::$connection->prepare($sql);

        return $statement->execute();
    }

    /**
     * @param $contactId
     * @return bool
     */
    public static function deleteContact($contactId): bool
    {
        parent::connect();
        return parent::$connection
            ->prepare("delete from contact where id = {$contactId}")
            ->execute();

    }

    /**
     * @param Contact $contactData
     * @return string
     */
    private function insertQuery(Contact $contactData): string
    {
        if (! $contactData->id) {

            return "INSERT INTO contact(name, age, phone_number, email)
                VALUES(
                       '{$contactData->name}',
                        {$contactData->age},
                       '{$contactData->phoneNumber}',
                       '{$contactData->email}'
                )";
        }

        return "UPDATE contact SET
                    name = '{$contactData->name}',
                    age = {$contactData->age},
                    phone_number = '{$contactData->phoneNumber}',
                    email = '{$contactData->email}'
                WHERE id = {$contactData->id}";
    }

}