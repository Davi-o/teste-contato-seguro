<?php


namespace Model;


interface Model
{
    public function save(): bool;
    public function getAll(): string;
    public function delete($id): bool;
}