<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WorkspaceController
 *
 * @package AppBundle\Controller
 * @Route("/dashboard/workspace")
 */
class WorkspaceController extends Controller
{
    /**
     * Show a single workspace.
     *
     * @Route ("/{name}", name="workspace_show")
     *
     * @param $name
     *   The name of the workspace to show.
     *
     * @return Response
     *   The rendered workspace.
     */
    public function showAction($name)
    {
        // Find the workspace id from the given name.
        $workspaceRepo = $this->getDoctrine()
            ->getRepository('AppBundle:Workspace');
        $workspace = $workspaceRepo->findOneBy(['name' => $name]);
        $workspaceId = $workspace->getId();

        // Find all projects which have the given workspace id.
        $projectRepo = $this->getDoctrine()
            ->getRepository('AppBundle:Project');
        $projects = $projectRepo->findBy(['workspace' => $workspaceId]);

        if ($projects == null) {
            throw $this->createNotFoundException('Not found!');
        }
        else {
            return $this->render('AppBundle:Workspace:show.html.twig', [
                'projects' => $projects,
            ]);
        }
    }
}