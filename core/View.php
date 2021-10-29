<?php


namespace Core;


class View
{
    public static function generate(string $path, array $date = [])
    {
    extract($date);
    $filePath = 'public/view/' . $path . '.php';
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        throw new \Exception('Templates' . $filePath . 'absent');
    }
    }
}