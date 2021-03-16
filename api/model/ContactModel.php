<?php

namespace Model;

use Service\ContactService;
use Domain\Contact;
use PDO;

class ContactModel implements Model
{
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

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function save(): bool
    {
        return ContactService::insertNewContact($this->contact);
    }

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

    public function delete($contactId): bool
    {
        return ContactService::deleteContact($contactId);
    }

}