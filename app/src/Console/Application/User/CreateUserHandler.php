<?php

namespace Console\Application\User;

use Console\Domain\Model\User\User;
use Console\Domain\Model\User\UserEmail;
use Console\Domain\Model\User\UserId;
use Console\Domain\Model\User\UserName;
use Console\Domain\Model\User\UserRepository;

/**
 * Class CreateUserHandler
 * @package Console\Application\User
 */
class CreateUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserCommand $command): void
    {
        $email = new UserEmail($command->email());
        $user = $this->userRepository->byEmail($email);

        if ($user !== null) {
            throw new \InvalidArgumentException(
                sprintf('The email %s already exists.', $email)
            );
        }

        $this->userRepository->save(
            new User(
                new UserId($command->id()),
                $email,
                new UserName($command->name())
            )
        );
    }
}
