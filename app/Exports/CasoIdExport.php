<?php

namespace App\Exports;

use App\Models\Caso;
use Carbon\Carbon;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class CasoIdExport implements FromQuery
// class CasoIdExport implements FromQuery, WithHeadings
class CasoIdExport implements FromCollection,  WithMapping, WithHeadings
{
    use Exportable;

    public function __construct(int $municipio_id)
    {
        $this->municipio_id = $municipio_id;
    }




    public function columnFormats(): array
    {
        return [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    // public function query()
    // {
    //     // return Caso::select('nombre_pila', 'ap1', 'ap2', 'tel_contacto', 'tel_escuela', 'created_at', 'cct.nombre')->whereHas('cct', function ($query) {
    //     //     $query->where(['clave_municipio' => $this->municipio_id])->with(['cct']);
    //     // });
    //     return Caso::whereHas('cct', function ($query) {
    //         $query->where(['clave_municipio' => $this->municipio_id])->with(['cct:id,nombre_ct']);
    //     });
    // }
    // }
    public function collection()
    {

        return Caso::whereHas('cct', function ($query) {
            $query->where(['clave_municipio' => $this->municipio_id])->with(
                [
                    'cct:id,nombre_ct',
                    'rol:id,nombre',
                    'tipo:id,nombre',
                    'genero:id,nombre',
                ]
            );
        })->get();
    }

    public function map($caso): array
    {
        return [
            $caso->id,
            $caso->nombre_pila,
            $caso->ap1,
            $caso->ap2,
            $caso->genero->nombre,
            $caso->tipo->nombre,
            $caso->rol->nombre,
            $caso->tel_contacto,
            $caso->tel_escuela,
            $caso->cct->cct,
            $caso->cct->nombre_ct,
            Carbon::parse($caso->created_at)->toFormattedDateString(),
        ];
    }
    public function headings(): array
    {
        return [
            'No.',
            'Nombre de Pila',
            'Apellido 1',
            'Apellido 2',
            'Genero',
            'Tipo',
            'Rol dentro de la Escuela',
            'Telefono de la persona',
            'Telefono director o escuela',
            'cct',
            'nombre del ct',
            'Fecha de alta',
        ];
    }
}
