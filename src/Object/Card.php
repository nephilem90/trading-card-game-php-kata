<?php


namespace Object;


class Card
{
    /**
     * @var int
     */
    private $mana;

    private function __construct($data = [])
    {
        $this->mana = $data['mana'];
    }

    public static function createFromArray($data = [])
    {
        return new self($data);
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }
}