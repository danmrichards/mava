<?php

namespace AppBundle\EventListener;

use AppBundle\AppBundle;
use AppBundle\Entity\Notification;
use AppBundle\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Notifier
 * @package AppBundle\EventListener
 */
class Notifier
{
    /**
     * Subject of the notification.
     * @var string
     */
    private $subject;

    /**
     * Body of the notification.
     * @var string
     */
    private $body;

    /**
     * User to receive the notification.
     *
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * Notify users when an entity is updated.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->em = $args->getEntityManager();
        $this->notifyRelatedUsers($entity);
    }

    /**
     * Notify users when an entity is persisted.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->em = $args->getEntityManager();
        $this->notifyRelatedUsers($entity);
    }

    /**
     * Determine the entity type and notify users accordingly.
     *
     * @param $entity
     *   The entity that was updated.
     */
    public function notifyRelatedUsers($entity)
    {
        // Avoid infinite loop.
        if ($entity instanceof Notification) {
            return;
        }

        // A task was updated.
        if ($entity instanceof Task) {
            $this->subject = $entity->getTitle();
            $this->body = "updates for task: " . $entity->getTitle();
            $this->user = $entity->getUser();

            $this->addNewNotification();
        }
    }

    /**
     * Add the notification.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addNewNotification()
    {
        $manager = $this->em;

        // Generate the notification.
        $notification = new Notification();
        $notification->setSubject($this->subject);
        $notification->setBody($this->body);
        $notification->setUser($this->user);
        $notification->setCreatedAt(new \DateTime());
        $notification->setUpdatedAt(new \DateTime());

        $manager->persist($notification);
        $manager->flush();

        return new Response('Notification id ' . $notification->getId() . ' successfully created');
    }
}