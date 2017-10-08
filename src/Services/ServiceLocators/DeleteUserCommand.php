<?php

namespace DIP\Formation\Services\ServiceLocators;

/**
 * Class DeleteUserCommand
 *
 * @package DIP\Formation\Services\ServiceLocators
 */
class DeleteUserCommand
{
    private $userId;

    public function __construct()
    {
        $this->userId = 1;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}