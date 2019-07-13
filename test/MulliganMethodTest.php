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
        $this->returnIntForDeckDimensionOrFalse($mulliganMethod, $deckDimension);
    }

    /**
     * @test
     */
    public function setNumberCard()
    {
        $mulliganMethod = new MulliganMethod();
        $baseDeckDimension = 10;
        for ($i = 0; $i < 4; $i++) {
            $actualDeckDimension = $baseDeckDimension + $i;
            $mulliganMethod->setNumberCard($actualDeckDimension);
            $this->returnIntForDeckDimensionOrFalse(
                $mulliganMethod,
                $actualDeckDimension
            );
        }
    }

    private function returnIntForDeckDimensionOrFalse(
        MulliganMethod $mulliganMethod,
        $deckDimension
    ) {
        for ($i = 0; $i < $deckDimension; $i++) {
            $this->assertTrue(is_int($mulliganMethod->getNextTopCard()));
        }
        $this->assertTrue($mulliganMethod->getNextTopCard() === false);
    }
}
