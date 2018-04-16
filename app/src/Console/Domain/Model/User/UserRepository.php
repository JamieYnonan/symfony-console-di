<?php

namespace Console\Domain\Model\User;

/**
 * Interface UserRepository
 * @package Console\Domain\Model\User
 */
interface UserRepository
{
    public function byId(UserId $id): ?User;
    public function byEmail(UserEmail $email): ?User;
    public function save(User $user): void;
}
