<?php

namespace App\Imports;

use App\Models\Type_anomolie;
 use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnomaliesImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Type_anomolie([
            // "nom" => $row[0],
            "nom" => $row[0] 
        ]);
    }
       public function chunkSize(): int
    {
        return 10000;
    }
}
