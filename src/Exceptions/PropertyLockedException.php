<?php

namespace JaneJoe\LivewireSecureProperties\Exceptions;

use Exception;

class PropertyLockedException extends Exception
{
    public static function forComponent(string $componentClass, string $property): self
    {
        return new self(
            sprintf(
                'Security Violation: Property [%s] on component [%s] is locked by default. Add #[Unlocked] to allow client-side updates.',
                $property,
                $componentClass
            ),
            403
        );
    }
}
