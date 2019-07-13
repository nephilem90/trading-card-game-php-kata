<?php


namespace Object;


class Deck
{
    /**
     * @var array
     */
    private $cardList;

    public function __construct(CardInterface $card, $cardsData = [])
    {
        $cardList = [];
        foreach ($cardsData as $cardData) {
            /** @var CardInterface $newCard */
            $newCard = new $card;
            $newCard->set($cardData);
            $cardList[] = $newCard;
        }
        $this->cardList = $cardList;
    }

    public function getFirst()
    {
        return array_pop($this->cardList);
    }

    public function mulligan(MulliganMethod $mulliganMethod)
    {
        $mulliganMethod->setNumberCard(count($this->cardList));
    }
}