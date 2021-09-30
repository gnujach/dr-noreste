<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cct extends JsonResource
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
                'type' => 'Cct',
                'id' => $this->id,
                'attributes' => [
                    'nombre_ct' => $this->nombre_ct,
                    'cct' => $this->cct,
                    'descripcion_turno' => $this->descripcion_turno,
                    'zona_escolar' => $this->zona_escolar,
                    'sector' => $this->sector,
                    'domicilio_geografico' => $this->domicilio_geografico,
                    'descripcion_localidad' => $this->descripcion_localidad,
                    'descripcion_municipio' => $this->descripcion_municipio,
                    'nombre_director' => $this->nombre_director
                ]
            ],
            'links' => [
                'self' => url('/admin/ccts/' . $this->id),
            ]
        ];
    }
}
