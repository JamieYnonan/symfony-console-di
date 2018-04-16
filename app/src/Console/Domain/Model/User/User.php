<?php

namespace Console\Domain\Model\User;

/**
 * Class User
 * @package Console\Domain\Model\User
 */
final class User
{
    private $id;
    private $email;
    private $name;

    public function __construct(UserId $id, UserEmail $email, UserName $name)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }
}
