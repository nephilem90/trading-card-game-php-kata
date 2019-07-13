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

    /**
     * @test
     */
    public function creteOneSingleCardDeck()
    {
        $cardList = [
            ['mana' => 1],
        ];
        $deck = new Deck(new Object\KataGameCard(), $cardList);
        /** @var Object\KataGameCard $card */
        $card = $deck->getFirst();
        $this->assertEquals(1, $card->getDamage());
        $this->assertEquals(1, $card->getMana());
    }

    /**
     * @test
     */
    public function deckMulligan()
    {
        $cardList = [
            ['mana' => 1],
            ['mana' => 2],
        ];
        $deck = new Deck(new Object\KataGameCard(), $cardList);
        $mulliganMethod = $this->createMock(Object\MulliganMethod::class);
        $mulliganMethod->expects($this->at(1))
            ->method('getNextTopCard')
            ->will($this->returnValue(2));
        $mulliganMethod->expects($this->at(2))
            ->method('getNextTopCard')
            ->will($this->returnValue(1));
        $mulliganMethod->expects($this->at(3))
            ->method('getNextTopCard')
            ->will($this->returnValue(false));
        $mulliganMethod->method('setNumberCard');

        $deck->mulligan($mulliganMethod);

        /** @var Object\KataGameCard $card */
        $card = $deck->getFirst();
        $this->assertEquals(1, $card->getDamage());
        $this->assertEquals(1, $card->getMana());

        /** @var Object\KataGameCard $card */
        $card = $deck->getFirst();
        $this->assertEquals(2, $card->getDamage());
        $this->assertEquals(2, $card->getMana());

    }
}
