<?php

class WorkspaceControllerTest extends \Codeception\Test\Unit
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
        $workspaceId = $this->tester->grabFromRepository(
            'AppBundle:Workspace', 'id',
            [ 'name' => 'Writing' ]
        );

        $projectTitle = $this->tester->grabFromRepository(
            'AppBundle:Project', 'title',
            [ 'workspace' => $workspaceId ]
        );

        $this->assertEquals('Symfony book', $projectTitle, 'No match found');

        $this->tester->amOnRoute('workspace_show', ['name' => 'Writing']);

        $this->tester->seeResponseContains('Symfony book');
    }
}