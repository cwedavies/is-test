<?php

namespace App\Http\Resources;

use App\Http\Resources\Address as AddressResource;
use App\Http\Resources\UserRole as UserRoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'role' => new UserRoleResource($this->whenLoaded('role')),
            'addresses' => AddressResource::collection($this->whenLoaded('addresses')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
