<?php

namespace App\Console;

use App\Console\Commands\ConsoleAble;

class Kernel {

    /**
     * @var array
     */
    private $commands;
    private $formatter;

    /**
     * Kernel constructor.
     * @param array $commands
     * @param array $args
     * @param $formatter
     */
    public function __construct(array $commands, array $args, $formatter) {
        array_shift($args);

        $this->args = $args;
        $this->commands = $commands;
        $this->formatter = $formatter;
    }

    /**
     * Run console command .
     * @return mixed
     * @internal param $command
     */
    public function run() {
        try {
            $command = array_shift($this->args);

            if(! isset($this->commands[$command]))
                throw new \Exception('Invalid command');

            $resolver = new $this->commands[$command](
                $this->formatter
            );

            if(! $resolver instanceof ConsoleAble)
                throw new \Exception('Invalid command class.');

            return $resolver->run(
                $this->args
            );
        } catch(\Exception $e) {
            return cli_write_error(
                $e->getMessage()
            );
        }
    }
}