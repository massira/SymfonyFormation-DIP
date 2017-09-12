<?php

namespace DIP\Formation\Services;

/**
 * Class MessageGenerator
 *
 * @package DIP\Formation\Services
 */
class MessageGenerator
{
    /**
     * Gets a random happy message
     *
     * @return string
     */
    public function getHappyMessage()
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        return $messages[array_rand($messages)];
    }
}