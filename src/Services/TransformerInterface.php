<?php

namespace DIP\Formation\Services;

/**
 * Class TransformerInterface
 *
 * @package DIP\Formation\Services
 */
interface TransformerInterface
{
    /**
     * Transforms a string
     *
     * @param string $value
     *
     * @return string
     */
    public function transform($value);
}