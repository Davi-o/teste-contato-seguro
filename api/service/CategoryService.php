<?php


namespace Service;


use Domain\Category;
use Repository\CategoryRepository;

/**
 * Class CategoryService
 * @package Service
 */
class CategoryService extends Connection implements CategoryRepository
{

    /**
     * @param Category $category
     * @return bool
     */
    public static function insertNewCategory(Category $category): bool
    {
        // TODO: Implement insertNewCategory() method.
    }

    /**
     * @return mixed|void
     */
    public static function getCategories()
    {
        // TODO: Implement getCategories() method.
    }

    /**
     * @param $categoryId
     * @return bool
     */
    public static function deleteCategory($categoryId): bool
    {
        // TODO: Implement deleteCategory() method.
    }
}