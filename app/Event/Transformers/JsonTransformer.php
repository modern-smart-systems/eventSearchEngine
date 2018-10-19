<?php

namespace App\Event\Transformers;

class JsonTransformer extends Transformer
{
    /**
     * Apply the transformation.
     *
     * @param $data
     * @return mixed
     */
    public function transform($data)
    {
        return $data;
    }
}