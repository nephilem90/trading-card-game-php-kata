<?php


namespace Object;


class KataGameCard implements CardInterface
{
    /**
     * @var int
     */
    private $mana;

    public function set($data = [])
    {
        $this->mana = $data['mana'];
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }
}