<?php

namespace App\Console\Commands;

use App\Console\ConsoleAble;
use App\Console\ConsoleException;

abstract class Command implements ConsoleAble {

    /**
     * @var mixed
     */
    protected $formatter;

    /**
     * Command constructor.
     */
    public function __construct() {
        $this->formatter = ioc('climate');
    }

    /**
     * Run command .
     *
     * @param array $args
     * @return mixed
     */
    public function run(array $args) {
        try {
            $this->handle($args);
        } catch(ConsoleException $e) {
            return $this->error(
                $e->getMessage()
            );
        }
    }

    /**
     * Register handler function .
     *
     * @param array $args
     * @return mixed
     */
    abstract function handle(array $args);

    /**
     * Get formatter instance .
     *
     * @return mixed
     */
    protected function formatter() {
        return $this->formatter;
    }


    /**
     * Write success message .
     *
     * @param $message
     * @return mixed
     */
    public function success($message) {
        return $this->formatter()->to('error')->red($message);
    }

    /**
     * Write info message .
     *
     * @param $message
     * @return mixed
     */
    public function info($message) {
        return $this->formatter()->to('error')->red($message);
    }

    /**
     * Write error message .
     *
     * @param $message
     * @return mixed
     */
    public function error($message) {
        return $this->formatter()->to('error')->red($message);
    }
}