<?php

namespace App\Imports;

use App\Models\Rate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class RateImport implements ToCollection,WithStartRow
{

    protected $contract_id;
    //ID Recibe como parametro del contrato
    // Se hace un metodo constructor para siempre tener ese ID presente.
    public function __construct($id)
    {
        $this->contract_id = $id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Rate::create([
                'origin' => $row[0],
                'destination' => $row[1],
                'currency' => $row[2],
                'twenty' => $row[3],
                'forty' => $row[4],
                'fortyhc' => $row[5],
                'contract_id' => $this->contract_id
            ]);
        }
    }
    public function startRow(): int
    {
        return 2;
    }
}



//Ignorar el primer campo



