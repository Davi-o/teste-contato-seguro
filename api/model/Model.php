<?php


namespace Model;


/**
 * Interface Model
 * @package Model
 */
interface Model
{
    /**
     * @return bool
     */
    public function save(): bool;

    /**
     * @return string
     */
    public function getAll(): string;

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}