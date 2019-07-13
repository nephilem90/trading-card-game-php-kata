<?php


use Object\MulliganMethod;
use PHPUnit\Framework\TestCase;

class MulliganMethodTest extends TestCase
{
    /**
     * @test
     */
    public function returnNumberForDeckDimensionOrFalse()
    {
        $deckDimension = 10;
        $mulliganMethod = new MulliganMethod($deckDimension);
        for ($i = 0; $i < $deckDimension; $i++) {
            $this->assertTrue(is_int($mulliganMethod->getNextTopCard()));
        }
        $this->assertTrue($mulliganMethod->getNextTopCard() === false);
    }
}
