<?php

namespace DIP\Formation\Services\ParentServices;


class DoctrinePostService extends BaseDoctrineRepository
{
    /**
     * DoctrinePostService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }

    /**
     * Logs message
     *
     * @param string $message
     */
    public function log($message)
    {
        $this->logger->log($message);
    }
}