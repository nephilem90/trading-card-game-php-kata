<?php


use Game\Card;

class KataGameCardTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createCardFromArray()
    {
        $card = new Card();
        $card->set(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
    }

    /**
     * @test
     */
    public function damageAndManaIsEquals()
    {
        $card = new Card();
        $card->set(['mana' => 1]);
        $this->assertEquals(1, $card->getMana());
        $this->assertEquals(1, $card->getDamage());
    }

    /**
     * @test
     */
    public function toArray()
    {
        $card = new Card();
        $card->set(['mana' => 1]);
        $cardArray = $card->toArray();
        $this->assertEquals(1, $cardArray['mana']);
        $this->assertEquals(1, $cardArray['damage']);
    }
}
