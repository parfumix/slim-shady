<?php

namespace App\Entity;

use Spot\Entity;

class Project extends Entity {

    protected static $table = 'projects';

    /**
     * Get fields .
     *
     * @return array
     */
    public static function fields() {
        return [
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name' => ['type' => 'string', 'required' => true],
        ];
    }

}