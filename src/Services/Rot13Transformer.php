<?php

namespace DIP\Formation\Services;

/**
 * Class Rot13Transformer
 *
 * @package DIP\Formation\Services
 */
class Rot13Transformer implements TransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transform($value)
    {
        return str_rot13($value);
    }
}
