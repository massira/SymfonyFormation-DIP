<?php

namespace DIP\Formation\Services\ParentServices;

/**
 * Class BaseDoctrineRepository
 *
 * @package DIP\Formation\Services\ParentServices
 */
abstract class BaseDoctrineRepository
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    protected $entityManager;

    /**
     * BaseDoctrineRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}