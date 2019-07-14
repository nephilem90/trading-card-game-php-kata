<?php

namespace Service;

use Game\Card;
use Object\Deck;
use PHPUnit\Framework\TestCase;

class DeckServiceTest extends TestCase
{
    /**
     * @test
     */
    public function fillDeckFromCardList()
    {
        $cardList = [
            ['mana' => 1],
            ['mana' => 2],
        ];
        $deckService = new DeckService();
        /** @var Deck $deck */
        $deck = $deckService->fillDeckFromCardList(new Deck(), new Card(), $cardList);
        $this->assertEquals(2, $deck->getFirst()->getMana());
        $this->assertEquals(1, $deck->getFirst()->getMana());
    }
}
