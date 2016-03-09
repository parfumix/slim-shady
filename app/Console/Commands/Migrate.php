<?php

namespace App\Console\Commands;

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

        $entities = $this->getEntities();

        array_walk($entities, function($entity) use($db, $command) {
            $db->mapper($entity)
                ->migrate();

            $command->formatter->info(ucfirst($entity) . ' migrated');
        });

        $this->formatter->br();
        $this->formatter->success('Migration created successfully!');

        return $this;
    }

    /**
     * Get migration entities .
     *
     * @return array
     */
    protected function getEntities() {
        return [
            User::class
        ];
    }
}