<?php


namespace Object;


class MulliganMethod
{
    /** @var int */
    private $numberCard;

    /**
     * MulliganMethod constructor.
     * @param int $numberCard
     */
    public function __construct($numberCard)
    {
        $this->numberCard = $numberCard;
    }


    /**
     * @return int|bool
     */
    public function getNextTopCard()
    {
        $nexCard = false;
        if ($this->numberCard > 0) {
            $nexCard = rand(0, $this->numberCard--);
        }
        return $nexCard;
    }
}