<?php

namespace Console\Domain\Model\User;

use Console\Domain\ValueObjectString;
use Ramsey\Uuid\Uuid;

/**
 * Class UserId
 * @package Console\Domain\Model\User
 */
final class UserId extends ValueObjectString
{
    protected function setValue(string $value): void
    {
        if (!Uuid::isValid($value)) {
            throw new \InvalidArgumentException(
                sprintf('The id %s is invalid.', $value)
            );
        }

        $this->value = $value;
    }
}
