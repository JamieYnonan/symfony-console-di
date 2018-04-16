<?php

namespace Console\Infrastructure\Domain\Model\User;

use Console\Domain\Model\User\User;
use Console\Domain\Model\User\UserEmail;
use Console\Domain\Model\User\UserId;
use Console\Domain\Model\User\UserRepository;

/**
 * Class ArrayUserRepository
 * @package Console\Infrastructure\Domain\Model\User
 */
class ArrayUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users = [];

    public function byId(UserId $id): ?User
    {
        if (!isset($this->users[$id->value()])) {
            return null;
        }

        return $this->users[$id->value()];
    }

    public function byEmail(UserEmail $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email()->equals($email)) {
                return $user;
            }
        }

        return null;
    }

    public function save(User $user): void
    {
        $this->users[$user->id()->value()] = $user;
    }
}
