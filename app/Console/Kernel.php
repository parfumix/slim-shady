<?php

namespace App\Console;

class Kernel {

    /**
     * @var array
     */
    private $commands;

    /**
     * Kernel constructor.
     * @param array $commands
     * @param array $args
     */
    public function __construct(array $commands, array $args) {
        array_shift($args);

        $this->args = $args;
        $this->commands = $commands;
    }

    /**
     * Run console command .
     *
     * @param $command
     * @return mixed
     * @throws ConsoleException
     */
    public function run() {
        $command = array_shift($this->args);

        if(! isset($this->commands[$command]))
            throw new ConsoleException('Invalid command');

        $resolver = new $this->commands[$command]();

        if(! $resolver instanceof ConsoleAble)
            throw new ConsoleException('Invalid command class.');

        return $resolver->run(
            $this->args
        );
    }
}