<?php

namespace DIP\Formation\Services;

/**
 * Class UppercaseTransformer
 *
 * @package DIP\Formation\Services
 */
class UppercaseTransformer implements TransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transform($value)
    {
        return strtoupper($value);
    }

}