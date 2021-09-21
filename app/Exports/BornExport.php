<?php

namespace App\Exports;

use App\Models\Born;
use Maatwebsite\Excel\Concerns\FromCollection;

class BornExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Born::all();
    }
}
