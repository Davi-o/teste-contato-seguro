<?php


namespace Service;


use Domain\Category;
use Repository\CategoryRepository;

class CategoryService extends Connection implements CategoryRepository
{

    public static function insertNewCategory(Category $category): bool
    {
        // TODO: Implement insertNewCategory() method.
    }

    public static function getCategories()
    {
        // TODO: Implement getCategories() method.
    }

    public static function deleteCategory($categoryId): bool
    {
        // TODO: Implement deleteCategory() method.
    }
}