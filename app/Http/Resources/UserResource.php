<?php

namespace App\Http\Resources;

use Avatar;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $role = $this->roles->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_email_verified' => !is_null($this->email_verified_at),
            'created_at' => $this->created_at,
            'role' => $role?->name,
            'permissions' => $role?->permissions->pluck('name'),
            'photo' => $this->getFirstMediaUrl('profile-image')?: Avatar::create($this->name)->toBase64(),
            'phone' => $this->phone,
            'post_code' => $this->post_code,
            'city' => $this->city,
            'country' => $this->country,
            'is_pending_email' => !is_null($this->getPendingEmail()),
            'pending_email' => $this->getPendingEmail(),
        ];
    }
}
