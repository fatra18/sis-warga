<?php

namespace App\Exports;

use App\Models\Cormer;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cormer::all();
    }
}
