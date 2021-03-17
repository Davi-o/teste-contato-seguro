<?php

namespace Model;

use Service\ContactService;
use Domain\Contact;
use PDO;

/**
 * Class ContactModel
 * @package Model
 */
class ContactModel implements Model
{
    /**
     * @var Contact
     */
    protected Contact $contact;

    /**
     * @todo use this attribute please
     */
    protected array $categories;

    /**
     * UserModel constructor.
     * @param array|null $contactData
     */
    public function __construct(array $contactData = null)
    {
        $this->contact = new Contact($contactData);
        return $this->contact;
    }

    /**
     * @param $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        return $this->$attribute;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        return ContactService::insertNewContact($this->contact);
    }

    /**
     * @return string
     */
    public function getAll(): string
    {
        $users = [];
        $usersData = ContactService::getContactData();
        while ($data = $usersData->fetch(PDO::FETCH_ASSOC)) {
            $users[] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'age' => $data['age'],
                'phoneNumber' => $data['phone_number'],
                'email' => $data['email']
            ];
        }

        return json_encode($users)?:"{}";
    }

    /**
     * @param $contactId
     * @return bool
     */
    public function delete($contactId): bool
    {
        return ContactService::deleteContact($contactId);
    }

}