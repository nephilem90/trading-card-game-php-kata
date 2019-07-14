<?php


namespace Service;


use Game\Card;
use Object\CardInterface;
use Object\Deck;

class DeckService
{
    public function fillDeckFromCardList(Deck $deck, Card $card, $cardList = [])
    {
        foreach ($cardList as $cardArray) {
            /** @var CardInterface $newCard */
            $newCard = new $card;
            $newCard->set($cardArray);
            $deck->add($newCard);
        }
        return $deck;
    }
}