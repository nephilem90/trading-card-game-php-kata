<?php


use Object\KataGameCard;

class KataGameCardTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createCardFromArray()
    {
        $card = KataGameCard::createCardFromArray(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
    }
}
