<?php


class WorkspaceControllerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function testShowAction(FunctionalTester $I)
    {
        $I->wantTo('see inside the "Writing" workspace');
        $I->amOnPage('/workspace/writing');
        $I->see('Symfony book');
    }
}
