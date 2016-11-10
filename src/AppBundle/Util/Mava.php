<?php

namespace AppBundle\Util;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Helper class for mava.
 *
 * @package AppBundle\Mava
 */
class Mava
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * Mava constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Get all finished tasks.
     *
     * @return int
     */
    public function finishedTasks()
    {
        $projects = $this->wsAllProjects();
        $taskRepo = $this->em->getRepository('AppBundle:Task');
        $total = 0;

        foreach ($projects as $project) {
            $total += count($taskRepo->getFinishedTasks($project->getId()));
        }

        return $total;
    }

    /**
     * Get all due tasks.
     *
     * @return int
     */
    public function dueTasks()
    {
        $projects = $this->wsAllProjects();
        $taskRepo = $this->em->getRepository('AppBundle:Task');
        $total = 0;

        foreach ($projects as $project) {
            $total += count($taskRepo->getDueTasks($project->getId()));
        }

        return $total;
    }

    /**
     * Get all new tasks.
     *
     * @return int
     */
    public function newTasks()
    {
        $projects = $this->wsAllProjects();
        $taskRepo = $this->em->getRepository('AppBundle:Task');
        $total = 0;

        foreach ($projects as $project) {
            $total += count($taskRepo->getNewTasks($project->getId()));
        }

        return $total;
    }

    /**
     * Get all projects within a given workspace.
     *
     * @return array
     */
    public function wsAllProjects()
    {
        return $this->em
            ->getRepository('AppBundle:Project')
            ->getAllProjects();
    }
}