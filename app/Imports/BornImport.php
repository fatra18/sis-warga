<?php

namespace App\Imports;

use App\Models\Born;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class BornImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow():int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Born([
            'name' => $row[1],
            'date_of_birth' => $row[2],
            'gender' => $row[3],
            'family_cards_id' => $row[4],
         
        ]);
    }
}
