<?php

namespace App\Console\Commands;

abstract class Command implements ConsoleAble {

    /**
     * @var mixed
     */
    protected $formatter;

    /**
     * Command constructor.
     * @param $formatter
     */
    public function __construct($formatter) {
        $this->formatter = $formatter;
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
        return cli_write_success($message);
    }

    /**
     * Write info message .
     *
     * @param $message
     * @return mixed
     */
    public function info($message) {
        return cli_write_info($message);
    }

    /**
     * Write error message .
     *
     * @param $message
     * @return mixed
     */
    public function error($message) {
        return cli_write_error($message);
    }
}