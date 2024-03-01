<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBets implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Import([
            'webSite' => $row[0][8],
            'totalbets' => $row[0][18],
            'betDate' => $row[2][2],
        ]);
    }
}
