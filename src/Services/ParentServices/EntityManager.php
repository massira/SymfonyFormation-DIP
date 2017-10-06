<?php

namespace DIP\Formation\Services\ParentServices;

/**
 * Class EntityManager
 *
 * @package DIP\Formation\Services\ParentServices
 */
class EntityManager implements EntityManagerInterface
{
    private $entities;

    /**
     * EntityManager constructor.
     */
    public function __construct()
    {
        $this->entities = [];
    }

    /**
     * @inheritdoc
     */
    public function persist($entity)
    {
        array_push($this->entities, $entity);
    }
}