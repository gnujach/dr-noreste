<?php

namespace App\Exports;

use App\Models\Caso;
use Maatwebsite\Excel\Concerns\FromCollection;

class CasoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Caso::all();
    }
}
