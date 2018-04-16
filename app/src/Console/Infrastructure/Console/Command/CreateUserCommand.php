<?php

namespace Console\Infrastructure\Console\Command;

use Console\Application\User\CreateUserHandler;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 * @package Console\Infrastructure\Console\Command
 */
class CreateUserCommand extends Command
{
    protected static $defaultName = 'console:create-user';

    private $handler;

    public function __construct(CreateUserHandler $handler)
    {
        $this->handler = $handler;

        parent::__construct(null);
    }

    protected function configure()
    {
        $this
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
            ->addArgument('name',
                InputArgument::REQUIRED,
                'The name of the user.'
            )
            ->addArgument('email',
                InputArgument::REQUIRED,
                'The email of the user.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = Uuid::uuid4()->toString();
        $this->handler->handle(
            new \Console\Application\User\CreateUserCommand(
                $id,
                $input->getArgument('name'),
                $input->getArgument('email')
            )
        );
        $output->writeln(['User Created', '============']);
        $output->writeln(sprintf('Id: %s', $id));
        $output->writeln(sprintf('Name: %s', $input->getArgument('name')));
        $output->writeln(sprintf('Email: %s', $input->getArgument('email')));
    }
}
