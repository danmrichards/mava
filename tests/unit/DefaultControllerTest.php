<?php

class DefaultControllerTest extends \Codeception\Test\Unit
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

    /**
     * Test the about page.
     */
    public function testAboutAction()
    {
        $this->assertTrue(true);
    }
}