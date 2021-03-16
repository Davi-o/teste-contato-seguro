<?php

namespace Formatter;
use Model\ContactModel;
use Util\Standardize;

class ContactFormatter
{
    private array $data;

    public function __construct($data)
    {
        $this->data = $data;
        return $this;
    }

    public function formatContactData(): ContactModel
    {
        Standardize::formatFields($this->data);
        return $this->getContact();
    }

    private function getContact(): ContactModel
    {
        return new ContactModel($this->data);
    }

}