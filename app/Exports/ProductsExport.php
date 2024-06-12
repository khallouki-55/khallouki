<?php

namespace App\Exports;

use App\Models\Courrier;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Facades\Excel;

class ProductsExport implements FromCollection
{
    public function collection()
    {
        return Courrier::all();
    }
}
