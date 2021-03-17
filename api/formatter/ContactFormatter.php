<?php

namespace Formatter;
use Model\ContactModel;
use Util\Standardize;

/**
 * Class ContactFormatter
 * @package Formatter
 */
class ContactFormatter
{
    /**
     * @var array
     */
    private array $data;

    /**
     * ContactFormatter constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return ContactModel
     */
    public function formatContactData(): ContactModel
    {
        Standardize::formatFields($this->data);
        return $this->getContact();
    }

    /**
     * @return ContactModel
     */
    private function getContact(): ContactModel
    {
        return new ContactModel($this->data);
    }

}