<?php


class DashboardControllerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testShowAction(AcceptanceTester $I)
    {
        $I->wantTo('to see inside the dashboard area');
        $I->amOnPage('/dashboard');
        $I->see('This is a placeholder for the dashboard area');
        $I->wait(3);
    }
}
