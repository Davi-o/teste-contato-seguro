<?php

namespace Domain;

/**
 * Class Contact
 * @package Domain
 */
class Contact
{
    /**
     * @var mixed|null
     */
    protected $id;
    /**
     * @var string|mixed
     */
    protected string $name;
    /**
     * @var int|mixed
     */
    protected int $age;
    /**
     * @var string|mixed
     */
    protected string $email;
    /**
     * @var string|mixed
     */
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