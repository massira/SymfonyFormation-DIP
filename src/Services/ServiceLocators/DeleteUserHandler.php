<?php

namespace DIP\Formation\Services\ServiceLocators;

/**
 * Class DeleteUserHandler
 *
 * @package DIP\Formation\Services\ServiceLocators
 */
class DeleteUserHandler
{
    private $users;

    public function __construct()
    {
        $this->users = [1,2,3];
    }

    public function handle(DeleteUserCommand $deleteUserCommand)
    {
        array_splice($this->users, array_search($deleteUserCommand->getUserId(), $this->users), 1);

        print_r($this->users);
    }

    public function getUsers()
    {
        return $this->users;
    }
}