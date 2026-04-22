<?php

namespace App\Exports;

use App\Models\modelPPDB;
use Maatwebsite\Excel\Concerns\FromCollection;

class PpdbExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return modelPPDB::all();
    }
}
