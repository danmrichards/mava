<?php


class DashboardControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testShowAction()
    {
        $this->tester->amOnRoute('dashboard_index');
        $this->tester->seeResponseContains('This is a placeholder for the dashboard area');
    }
}