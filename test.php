<?php

use PHPUnit\Framework\TestCase;

require_once '123.php'; 

class TestFunctionTest extends TestCase
{
    public function testTest()
    {
        $this->assertEquals('Cat', multipartReverse('Tac'));
        $this->assertEquals('Мышь', multipartReverse('Ьшым'));
        $this->assertEquals('houSe', multipartReverse('esuOh'));
        $this->assertEquals('домИК', multipartReverse('кимОД'));
        $this->assertEquals('elEpHant', multipartReverse('tnAhPele'));

        $this->assertEquals('cat,', multipartReverse('tac,'));
        $this->assertEquals('Зима:', multipartReverse('Амиз:'));
        $this->assertEquals('is "cold" now', multipartReverse('si "dloc" won'));
        $this->assertEquals('это «Так» "просто"', multipartReverse('отэ «Кат» "отсорп"'));
    }
}