<?php

namespace App\Entity;

use Spot\Entity;

class User extends Entity {

    protected static $table = 'users';

    public static function fields() {
        return [
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true]
        ];
    }
}