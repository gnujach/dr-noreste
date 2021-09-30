<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Genero as GeneroResource;
use App\Http\Resources\Rol as RolResource;
use App\Http\Resources\Tipo as TipoResource;
use App\Http\Resources\Cct as CctResource;

class Caso extends JsonResource
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
                'type' => 'Caso',
                'id' => $this->uuid,
                'genero' => new GeneroResource($this->whenLoaded('genero')),
                'tipo' => new TipoResource($this->whenLoaded('tipo')),
                'rol' => new RolResource($this->whenLoaded('rol')),
                'cct' => new CctResource($this->whenLoaded('cct')),
                'attributes' => [
                    'nombre_pila' => $this->nombre_pila,
                    'cct_id' => $this->cct_id,
                    'ap1' => $this->ap1,
                    'ap2' => $this->ap2,
                    'tel_contacto' => $this->tel_contacto,
                    'tel_reporta' => $this->tel_reporta,
                    'nombre_reporta' => $this->nombre_reporta,
                    'has_prueba' => $this->has_prueba,
                    'is_atendido' => $this->is_atendido,
                    'fecha_regreso' => $this->fecha_regreso,
                    'observaciones_reporta' => $this->observaciones_reporta,
                    'observaciones_enlace' => $this->observaciones_enlace,
                    'nombre_completo' => $this->nombre_pila . " " . $this->ap1 . " " . $this->ap2,
                    'genero_id' => $this->genero_id,
                    'rol_id' => $this->rol_id,
                    'tipo_id' => $this->tipo_id,
                    'created_at' => \Carbon\Carbon::parse($this->created_at)->diffForHumans(),
                    'updated_at' => \Carbon\Carbon::parse($this->updated_at)->diffForHumans(),
                ]
            ],
            'links' => [
                'self' => url('/admin/user/' . $this->id),
            ]
        ];
    }
}
