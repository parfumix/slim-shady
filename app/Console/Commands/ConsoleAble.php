<?php

namespace App\Console\Commands;

interface ConsoleAble {

    /**
     * Run command .
     *
     * @param array $args
     * @return array|mixed
     */
    public function handle(array $args);
}