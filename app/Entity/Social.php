<?php

namespace App\Entity;

use Spot\Entity;
use Spot\EntityInterface;
use Spot\MapperInterface;

class Social extends Entity {

    protected static $table = 'social';

    /**
     * Get fields .
     *
     * @return array
     */
    public static function fields() {
        return [
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'token' => ['type' => 'string', 'required' => true],
            'user_id' => ['type' => 'integer', 'required' => true],
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
            'user' => $mapper->belongsTo($entity, User::class, 'id')
        ];
    }
}