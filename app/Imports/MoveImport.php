<?php

namespace App\Imports;

use App\Models\Move;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MoveImport implements ToModel, WithStartRow
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
        return new Move([
            'residents_id' => $row[1],
            'date_move' => $row[2],
            'reason' => $row[3],
        ]);
    }
}
