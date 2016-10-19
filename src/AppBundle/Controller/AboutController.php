<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AboutController
 *
 * @package AppBundle\Controller
 */
class AboutController extends Controller
{
    /**
     * @Route(
     *     "/about/{name}",
     *     name="about",
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
            if (false == $user instanceof User) {
                throw $this->createNotFoundException('No user named ' . $name . ' found!');
            }
        }

        return $this->render('AppBundle:About:user.html.twig', [
            'user' => !empty($user) ? $user : null,
        ]);
    }

    /**
     * @Route(
     *     "/about/{name}/details",
     *     name="about_details",
     *     defaults={"name": null}
     * )
     */
    public function detailsAction($name) {
        // Load the user by name.
        if ($name) {
            $user = $this->getDoctrine()
                ->getRepository('AppBundle:User')
                ->findOneBy(array('name' => $name));

            // Throw an exception if the user does not exist.
            if (false == $user instanceof User) {
                throw $this->createNotFoundException('No user named ' . $name . ' found!');
            }
        }

        return $this->render('AppBundle:About:more.html.twig', [
            'user' => !empty($user) ? $user : null,
        ]);
    }
}
