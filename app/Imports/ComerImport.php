<?php

namespace App\Imports;

use App\Models\Cormer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ComerImport implements ToModel,WithStartRow
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
        return new Cormer([
            'id_number' => $row[1],
            'name_comers' => $row[2],
            'gender' => $row[3],
            'arrival_date' => $row[4],
            'residents_id' => $row[5],
         
        ]);
    }
}
