<?php

namespace Util;

/**
 * Trait Standardize
 * @package Util
 */
trait Standardize
{

    /**
     * @param array $fields
     * @return array
     */
    public static function formatFields($fields = []): array
    {
        foreach ($fields as $name => &$value) {
            $value = htmlspecialchars(strip_tags($value));
        }

        return $fields;
    }

}