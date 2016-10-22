<?php


class WorkspaceControllerAcceptCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testShowAction(AcceptanceTester $I)
    {
        $I->wantTo('To see inside the "writing" workspace');
        $I->amOnPage('/workspace/writing');
        $I->see('Symfony book');
        $I->wait(3);
    }
}
