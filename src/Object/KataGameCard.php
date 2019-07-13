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

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->getMana();
    }

    public function toArray()
    {
        return [
            'mana' => $this->getMana(),
            'damage' => $this->getDamage()
        ];
    }
}