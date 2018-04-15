<?php


namespace App\Filter;


class RemoveSpacesFilter implements FilterInterface
{
    public function filter($string)
    {
        return str_replace(' ', '', $string);
    }
}
