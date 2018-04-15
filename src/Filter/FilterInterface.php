<?php


namespace App\Filter;


interface FilterInterface
{
    public function filter($string): string;
}