<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_admin' => $this->is_admin,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
