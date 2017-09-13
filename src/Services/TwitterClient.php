<?php

namespace DIP\Formation\Services;

/**
 * Class TwitterClient
 *
 * @package DIP\Formation\Services
 */
class TwitterClient
{
    private $transformer;

    /**
     * TwitterClient constructor.
     *
     * @param TransformerInterface $transformer
     */
    public function __construct(TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param string $user
     * @param string $key
     * @param string $status
     */
    public function tweet($user, $key, $status)
    {
        print 'The status: ' . $this->transformer->transform($status) . 'is tweeted for the user: ' . $user . 'and key: ' . $key;
    }
}