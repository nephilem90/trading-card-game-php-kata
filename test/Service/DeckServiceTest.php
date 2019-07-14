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
        $card1 = ['mana' => 1];
        $card2 = ['mana' => 2];
        $cardList = [
            $card1,
            $card2,
        ];
        $deckService = new DeckService();
        /** @var Deck $deck */
        $deck = $deckService->fillDeckFromCardList(new Deck(), new Card(), $cardList);
        $this->assertEquals($card2['mana'], $deck->getFirst()->toArray()['mana']);
        $this->assertEquals($card1['mana'], $deck->getFirst()->toArray()['mana']);
    }
}
