<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'logo' => $this->logo,
            'favicon' => $this->favicon,
            'dark_logo' => $this->dark_logo,
            'guest_logo' => $this->guest_logo,
            'guest_background' => $this->guest_background,
        ];
    }
}
