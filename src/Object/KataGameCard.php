<?php


namespace Object;


class KataGameCard implements CardInterface
{
    /**
     * @var int
     */
    private $mana;

    private function __construct($data = [])
    {
        $this->mana = $data['mana'];
    }

    public static function createCardFromArray($data = [])
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