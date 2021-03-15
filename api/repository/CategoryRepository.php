<?php


namespace Repository;


use Domain\Category;

interface CategoryRepository
{
    public static function insertNewCategory(Category $category): bool;
    public static function getCategories();
    public static function deleteCategory($categoryId): bool;
}