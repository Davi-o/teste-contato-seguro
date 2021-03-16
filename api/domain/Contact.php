<?php

namespace Domain;

class Contact
{
    protected $id;
    protected string $name;
    protected int $age;
    protected string $email;
    protected string $phoneNumber;

    /**
     * UserModel constructor.
     * @param array|null $contactData
     */
    public function __construct(array $contactData = null)
    {
        if($contactData) {
            $this->id = isset($contactData['id'])?$contactData['id']:null;
            $this->name = $contactData['name'];
            $this->age = $contactData['age'];
            $this->email = $contactData['email'];
            $this->phoneNumber = $contactData['phoneNumber'];

            return $this;
        }
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }


}