<?php

namespace Console\Domain\Model\User;

use Console\Domain\ValueObjectString;

/**
 * Class UserEmail
 * @package Console\Domain\Model\User
 */
final class UserEmail extends ValueObjectString
{
    protected function setValue(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                sprintf("%s isn't a valid email")
            );
        }

        $this->value = $value;
    }

    public function equals(UserEmail $email): bool
    {
        return $this->value() === $email->value();
    }
}
