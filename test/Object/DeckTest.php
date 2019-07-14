<?php


use Object\Deck;
use Game\Card;

class DeckTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function addAndGetCard()
    {
        $card = $this->createMock(\Object\CardInterface::class);
        $card->method('toArray')
            ->willReturn(['property' => 1]);
        $deck = new Deck();
        $deck->add($card);
        $this->assertEquals(['property' => 1], $deck->getFirst()->toArray());
    }

    /**
     * @test
     */
    public function deckMix()
    {
        $cardArray1 = ['mana' => 1];
        $cardArray2 = ['mana' => 2];

        $card1 = $this->createMock(\Object\CardInterface::class);
        $card1->method('toArray')
            ->willReturn($cardArray1);
        $card2 = $this->createMock(\Object\CardInterface::class);
        $card2->method('toArray')
            ->willReturn($cardArray2);

        $deck = new Deck();
        $deck->add($card2);
        $deck->add($card1);

        $mixMethod = $this->createMock(Object\MixMethod::class);
        $mixMethod->expects($this->at(1))
            ->method('getNextTopCard')
            ->will($this->returnValue(2));
        $mixMethod->expects($this->at(2))
            ->method('getNextTopCard')
            ->will($this->returnValue(1));
        $mixMethod->expects($this->at(3))
            ->method('getNextTopCard')
            ->will($this->returnValue(false));
        $mixMethod->method('setNumberCard');

        $deck->mix($mixMethod);

        $this->assertEquals($cardArray2, $deck->getFirst()->toArray());
        $this->assertEquals($cardArray1, $deck->getFirst()->toArray());
    }
}
