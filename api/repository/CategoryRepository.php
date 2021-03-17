<?php

namespace Repository;

use Domain\Category;

/**
 * Interface CategoryRepository
 * @package Repository
 */
interface CategoryRepository
{
    /**
     * @param Category $category
     * @return bool
     */
    public static function insertNewCategory(Category $category): bool;

    /**
     * @return mixed
     */
    public static function getCategories();

    /**
     * @param $categoryId
     * @return bool
     */
    public static function deleteCategory($categoryId): bool;
}