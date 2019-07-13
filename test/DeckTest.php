<?php


use Object\Deck;

class DeckTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createFromArray()
    {
        $card = $this->getMockBuilder('Object\CardInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $card->method('set');
        $cardList = [
            ['property' => 1],
        ];
        $deck = new Deck($card, $cardList);
        $this->assertTrue(is_a($deck->getFirst(), 'Object\CardInterface'));
    }
}
