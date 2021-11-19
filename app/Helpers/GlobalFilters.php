<?php


namespace App\Helpers;


class GlobalFilters
{
    const EXCEPTIONS = [
        'send',
    ];



    public static function postFilter () : array
    {
        $result = [];
        foreach ($_POST as $key=>$value)
        {
            if (false === array_search($key, self::EXCEPTIONS))
            {
                $result[$key] = $value;
            }
        }
        return $result;

    }
}