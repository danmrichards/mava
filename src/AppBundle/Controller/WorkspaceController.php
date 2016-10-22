<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceController extends Controller
{
    /**
     * Show a single workspace.
     *
     * @Route ("/workspace/{name}", name="workspace_show")
     *
     * @param $name
     *   The name of the workspace to show.
     *
     * @return Response
     *   The rendered workspace.
     */
    public function showAction($name)
    {
        // TODO: Find available projects in the given workspace.
        return $this->render('AppBundle:Workspace:show.html.twig', [
            'project' => 'Symfony book',
        ]);
    }
}