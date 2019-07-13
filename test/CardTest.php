<?php


use Object\Card;

class CardTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createFromArray()
    {
        $card = Card::createFromArray(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
    }
}
