<?php


namespace App\Tests\Controller;


use App\Filter\FilterFactory;
use App\Filter\HtmlSpecialCharsFilter;
use PHPUnit\Framework\TestCase;


class FilterStringTest extends TestCase
{
    private $text = "Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!";

    public function testFactory()
    {
        try {
            $filter = FilterFactory::createFilter('htmlSpecialChars');
            $this->assertInstanceOf(HtmlSpecialCharsFilter::class, $filter);
        } catch (\Exception $e) {

        }
    }

    public function testStripTags()
    {
        try {
            $expectedResult = str_replace(' ', '', $this->text);//easy))
            $filter = FilterFactory::createFilter('stripTags');
            $filteredText = $filter->filter($this->text);
            $this->assertEquals($filteredText, $expectedResult, 'fail');
        } catch (\Exception $e) {
            $this->fail('unknown filter');
        }
    }
}
