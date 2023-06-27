<?php

namespace App\Imports;

use App\Models\Utilisateur;
 use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Utilisateur([
            // "nom" => $row[0],
            "matricule" => $row[0],
            "password" => $row[1]
        ]);
    }
       public function chunkSize(): int
    {
        return 10000;
    }
}
