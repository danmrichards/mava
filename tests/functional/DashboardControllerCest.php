<?php


class DashboardControllerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function testShowAction(FunctionalTester $I)
    {
        $I->wantTo('to see inside the dashboard area');
        $I->amOnPage('/dashboard');
        $I->see('This is a placeholder for the dashboard area');
    }
}
