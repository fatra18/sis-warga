<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ResidentImport implements ToModel, WithStartRow
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
        return new Resident([
            'number_id' => $row[1],
            'name' => $row[2],
            'place_of_birth' => $row[3],
            'date_of_birth' => $row[4],
            'gender' => $row[5],
            'village' => $row[6],
            'blood_group' => $row[7],
            'address' => $row[8],
            'rt' => $row[9],
            'rw' => $row[10],
            'relegion' => $row[11],
            'marital_status' => $row[12],
            'work' => $row[13],
            'status' => $row[14],
            'contact' => $row[15],
            'education' => $row[16],
        ]);
    }
}
