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
        return $this->render('AppBundle:Dashboard:index.html.twig', array(
            // ...
        ));
    }

}
