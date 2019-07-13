<?php


use Object\MixMethod;
use PHPUnit\Framework\TestCase;

class MixMethodTest extends TestCase
{
    /**
     * @test
     */
    public function returnNumberForDeckDimensionOrFalse()
    {
        $deckDimension = 10;
        $mulliganMethod = new MixMethod($deckDimension);
        $this->returnIntForDeckDimensionOrFalse($mulliganMethod, $deckDimension);
    }

    /**
     * @test
     */
    public function setNumberCard()
    {
        $mulliganMethod = new MixMethod();
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
        MixMethod $mulliganMethod,
        $deckDimension
    ) {
        for ($i = 0; $i < $deckDimension; $i++) {
            $this->assertTrue(is_int($mulliganMethod->getNextTopCard()));
        }
        $this->assertTrue($mulliganMethod->getNextTopCard() === false);
    }
}
