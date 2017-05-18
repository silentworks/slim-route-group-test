<?php

namespace RouteGroupTest;

class UserEntity
{
    public function getEntities()
    {
        return [
            [
                'id' => 1,
                'name' => 'Slim 3',
                'desc' => 'Lazy Loading Route'
            ],
            [
                'id' => 2,
                'name' => 'Slim 3',
                'desc' => 'Lazy Loading Route'
            ]
        ];
    }

    public function getEntityById($id)
    {
        return [
            'id' => $id,
            'name' => 'Slim 3',
            'desc' => 'Lazy Loading Route'
        ];
    }
}