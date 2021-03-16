<?php

namespace Util;

trait Standardize
{

    public static function formatFields($fields = []): array
    {
        foreach ($fields as $name => &$value) {
            $value = htmlspecialchars(strip_tags($value));
        }

        return $fields;
    }

}