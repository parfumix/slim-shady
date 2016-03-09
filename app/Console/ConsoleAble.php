<?php

namespace App\Console;

interface ConsoleAble {

    /**
     * Run command .
     *
     * @param array $args
     * @return array|mixed
     */
    public function run(array $args);
}