<?php

namespace App\Entity;

use Spot\Entity;

class Package extends Entity {

    protected static $table = 'packages';

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