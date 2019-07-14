<?php


namespace Object;


class Deck
{
    /**
     * @var array
     */
    private $cardList;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        $this->cardList = [];
    }

    /**
     * @return CardInterface
     */
    public function getFirst()
    {
        return array_pop($this->cardList);
    }

    public function mix(MixMethod $mixMethod)
    {
        $mixMethod->setNumberCard(count($this->cardList));
        $newCardList = [];

        while ($nextFirstCard = $mixMethod->getNextTopCard()) {
            $actualCard = 0;
            foreach ($this->cardList as $index => $card) {
                $actualCard++;
                if ($actualCard != $nextFirstCard) {
                    continue;
                }
                $newCardList[] = clone($card);
                unset($this->cardList[$index]);
            }
        }
        $this->cardList = $newCardList;
    }

    /**
     * @param CardInterface $card
     * @return $this
     */
    public function add(CardInterface $card)
    {
        $this->cardList[] = $card;
        return $this;
    }
}