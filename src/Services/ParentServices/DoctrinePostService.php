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
}