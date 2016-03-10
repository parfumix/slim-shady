<?php

namespace App\Services;

use App\Entity\User;

class UserService {

    /**
     * Register user .
     *
     * @param array $data
     * @return mixed
     */
    public function register(array $data) {
        $validator = validate(
            $data, [
                'email' => 'required',
                'password' => 'min:6|max:32',
            ]
        );

        if(! $validator->passed())
            $validator->goBackWithErrors();

        $mapper = mapper(User::class);

        $entity = $mapper->build([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return $mapper->insert($entity);
    }
}