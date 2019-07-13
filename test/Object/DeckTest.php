<?php


use Object\Deck;
use Game\Card;

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

    /**
     * @test
     */
    public function creteOneSingleCardDeck()
    {
        $cardList = [
            ['mana' => 1],
        ];
        $deck = new Deck(new Card(), $cardList);
        /** @var Card $card */
        $card = $deck->getFirst();
        $this->assertEquals(1, $card->getDamage());
        $this->assertEquals(1, $card->getMana());
    }

    /**
     * @test
     */
    public function deckMix()
    {
        $cardList = [
            ['mana' => 1],
            ['mana' => 2],
        ];
        $deck = new Deck(new Card(), $cardList);
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

        /** @var Card $card */
        $card = $deck->getFirst();
        $this->assertEquals(1, $card->getDamage());
        $this->assertEquals(1, $card->getMana());

        /** @var Card $card */
        $card = $deck->getFirst();
        $this->assertEquals(2, $card->getDamage());
        $this->assertEquals(2, $card->getMana());

    }
}
