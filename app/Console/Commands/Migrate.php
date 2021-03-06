<?php

namespace App\Console\Commands;

use App\Entity\Social;
use App\Entity\User;

class Migrate extends Command {

    protected $description = 'My description';

    /**
     * Run command .
     *
     * @param array $args
     * @return mixed
     * @throws ConsoleException
     */
    public function handle(array $args) {
        $db = ioc('db'); $command = $this;

        $entities = load_config('migrations.php');

        array_walk($entities, function($entity) use($db, $command) {
            $db->mapper($entity)
                ->migrate();

            $command->formatter->info(ucfirst($entity) . ' migrated');
        });

        $this->formatter->br();
        $this->formatter->success('Migration created successfully!');

        return $this;
    }
}