<?php

/**
 * Class DefaultControllerCest.
 */
class DefaultControllerCest
{
    /**
     * @param FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
    }

    /**
     * @param FunctionalTester $I
     */
    public function _after(FunctionalTester $I)
    {
    }

    /**
     * Test the index page.
     *
     * @param FunctionalTester $I
     */
    public function indexActionTest(FunctionalTester $I)
    {
        $I->wantTo('to see the welcome message on the home page');
        $I->amOnPage('/');
        $I->see('Welcome');
    }
}
