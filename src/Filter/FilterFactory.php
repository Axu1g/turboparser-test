<?php


namespace App\Filter;

class FilterFactory
{
    public static function createFilter(string $type): FilterInterface
    {
        switch ($type) {
            case 'htmlSpecialChars':
                return new HtmlSpecialCharsFilter();
                break;
            case 'removeSpaces':
                return new RemoveSpacesFilter();
                break;
            default:
                throw new \Exception('unknown method');
        }
    }
}