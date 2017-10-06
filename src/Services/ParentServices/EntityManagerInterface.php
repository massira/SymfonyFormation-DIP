<?php

namespace DIP\Formation\Services\ParentServices;

/**
 * Interface EntityManagerInterface
 *
 * @package DIP\Formation\Services\ParentServices
 */
interface EntityManagerInterface
{
    /**
     * @param object $entity
     */
    public function persist($entity);
}