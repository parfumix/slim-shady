<?php

namespace App\Entity;

use Spot\Entity;
use Spot\EntityInterface;
use Spot\MapperInterface;

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

    /**
     * Relations setUp
     *
     * @param MapperInterface $mapper
     * @param EntityInterface $entity
     * @return array
     */
    public static function relations(MapperInterface $mapper, EntityInterface $entity) {
        return [
            'socials' => $mapper->hasMany($entity, User::class, 'user_id')
        ];
    }
}