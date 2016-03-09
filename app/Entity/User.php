<?php

namespace App\Entity;

use Spot\Entity;

class User extends Entity {

    protected static $table = 'users';

    /**
     * Get fields .
     *
     * @return array
     */
    public static function fields() {
        return [
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'email' => ['type' => 'string', 'required' => false],
            'password' => ['type' => 'string', 'required' => false],
        ];
    }
}