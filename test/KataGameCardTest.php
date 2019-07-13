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

    /**
     * @test
     */
    public function damageAndManaIsEquals()
    {
        $card = new KataGameCard();
        $card->set(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
        $this->assertEquals(1, $card->getDamage());
    }

    /**
     * @test
     */
    public function toArray()
    {
        $card = new KataGameCard();
        $card->set(['mana' => 1]);
        $cardArray = $card->toArray();
        $this->assertEquals(1, $cardArray['mana']);
        $this->assertEquals(1, $cardArray['damage']);
    }
}
