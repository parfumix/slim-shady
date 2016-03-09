<?php

namespace App\Console;

interface ConsoleAble {

    /**
     * Run command .
     *
     * @param array $args
     * @return array|mixed
     */
    public function handle(array $args);
}