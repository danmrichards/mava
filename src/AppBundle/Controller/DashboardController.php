<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("dashboard", name="dashboard_index")
     */
    public function indexAction()
    {
        // Get the number of finished, due and new tasks from the utility class.
        $util = $this->get('mava_util');
        $finishedTasks = $util->finishedTasks();
        $dueTasks = $util->dueTasks();
        $newTasks = $util->newTasks();

        return $this->render(':dashboard:index.html.twig', array(
            'finishedTasks' => $finishedTasks,
            'newTasks' => $newTasks,
            'dueTasks' => $dueTasks,
        ));
    }

}
