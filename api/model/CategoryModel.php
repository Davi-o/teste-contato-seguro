<?php

namespace Model;

use Domain\Category;

class CategoryModel
{
    private Category $category;
    /**
     * CategoryModel constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->category = new Category($id, $name);
        return $this;
    }

    public function __get($name)
    {
        return $this->$name;
    }


}