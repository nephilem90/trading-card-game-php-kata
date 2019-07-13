<?php


use Object\KataGameCard;

class KataGameCardTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createCardFromArray()
    {
        $card = new KataGameCard();
        $card->set(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
    }
}
