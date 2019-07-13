<?php


use Object\Deck;

class DeckTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createFromArray()
    {
        $card = $this->createMock(Object\CardInterface::class);
        $card->method('set');
        $cardList = [
            ['property' => 1],
        ];
        $deck = new Deck($card, $cardList);
        $this->assertTrue(is_a($deck->getFirst(), 'Object\CardInterface'));
    }

//    /**
//     * @test
//     */
//    public function deckMulligan()
//    {
//        $card = $this->createMock(Object\CardInterface::class);
//        $card->method('set');
//        $cardList = [
//            ['property' => 1],
//            ['property' => 2],
//        ];
//        $deck = new Deck($card, $cardList);
//        $mulliganMethod = $this->getMockClass();
//    }
}
