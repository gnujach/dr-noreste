<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Puesto extends JsonResource
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
            'data' => [
                'type' => 'puesto',
                'id' => $this->id,
                'attributes' => [
                    'nombre' => $this->nombre
                ]
            ]
        ];
    }
}
