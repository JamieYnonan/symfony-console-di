<?php

namespace Console\Application\User;

/**
 * Class CreateUserCommand
 * @package Console\Application\User
 */
class CreateUserCommand
{
    private $id;
    private $name;
    private $email;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
}
