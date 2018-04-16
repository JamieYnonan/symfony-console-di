<?php

namespace Console\Domain\Model\User;

use Console\Domain\ValueObjectString;

/**
 * Class UserName
 * @package Console\Domain\Model\User
 */
final class UserName extends ValueObjectString
{
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 45;

    protected function setValue(string $value): void
    {
        if (strlen($value) < 3 || strlen($value) > 45) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Name min length %d and max length %d",
                    self::MIN_LENGTH,
                    self::MAX_LENGTH
                )
            );
        }

        $this->value = $value;
    }
}
