<?php

namespace Util;

/**
 * Trait FormatRequest
 * @package Util
 */
trait FormatRequest
{
    /**
     * @param $request
     * @return mixed
     */
    public static function getArrayFromJson($request){
        return json_decode($request, true);
    }

}