<?php

namespace App\Http;

use Illuminate\Http\Resources\Json\JsonResource;

class umkm extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
