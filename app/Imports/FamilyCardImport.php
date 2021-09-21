<?php

namespace App\Imports;

use App\Models\FamilyCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FamilyCardImport implements ToModel,WithStartRow
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
        return new FamilyCard([
            'family_card_number' => $row[1],
            'residents_id' => $row[2],
            'village' => $row[3],
            'rt' => $row[4],
            'rw' => $row[5],
            'address' => $row[6],
            'regencies_id' => $row[7],
            'districts_id' => $row[8],
            'provinces_id' => $row[9],
          
        ]);
    }
}
