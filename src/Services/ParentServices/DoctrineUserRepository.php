<?php

namespace DIP\Formation\Services\ParentServices;

/**
 * Class DoctrineUserRepository
 *
 * @package DIP\Formation\Services\ParentServices
 */
class DoctrineUserRepository extends BaseDoctrineRepository
{
    /**
     * DoctrineUserRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }
}