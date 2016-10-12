<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route(
     *     "/about/{name}",
     *     name="aboutpage",
     *     defaults={"name": null}
     * )
     */
    public function aboutAction($name)
    {
        // Load the user by name.
        if ($name) {
            $user = $this->getDoctrine()
                ->getRepository('AppBundle:User')
                ->findOneBy(array('name' => $name));

            // Throw an exception if the user does not exist.
            if (FALSE == $user instanceof User) {
                throw $this->createNotFoundException('No user named ' . $name . ' found!');
            }
        }

        return $this->render('about/index.html.twig', [
            'user' => !empty($user) ? $user : NULL,
        ]);
    }
}
