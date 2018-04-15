<?php


namespace App\Filter;


class HtmlSpecialCharsFilter implements FilterInterface
{
    public function filter($string)
    {
        return htmlspecialchars($string);
    }
}