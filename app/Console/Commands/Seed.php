<?php

namespace App\Console\Commands;

class Seed extends Command {

    protected $description = 'My description';

    /**
     * Run command .
     *
     * @param array $args
     * @return mixed
     * @throws ConsoleException
     */
    public function handle(array $args) {
        return $this;
    }
}