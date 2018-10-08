<?php

namespace App\Event\Transformers;

class EventTransformer extends Transformer
{
    protected $resourceName = 'event';

    public function transform($data)
    {
        return [
            'name'              => $data['name'],
            'description'       => $data['description'],
            'country'           => $data['country'],
            'address'           => $data['address'],
            'createdAt'         => $data['created_at']->toAtomString(),
            'updatedAt'         => $data['updated_at']->toAtomString(),
            'author' => [
                'user'      => $data['user']['name'],
                'id '       => $data['user']['id'],
            ]
        ];
    }
}