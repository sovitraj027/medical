<?php

namespace App\Exports;

use App\Medicine;
use App\MedicineStock;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MedicineStockExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $test=MedicineStock::first();

        return view('export.medicinestock',[
            'medicinestock'=>MedicineStock::all()
        ]);
    }
  
}