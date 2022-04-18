<?php

namespace App\Http\Controllers;

use App\Exports\MedicineStockExport;
use App\Imports\MedicineImport;
use App\MedicineStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Maatwebsite\Excel\Facades\Excel;

class MedicineImportExportController extends Controller
{
    public function excelImport(Request $request ){
        Excel::import(new MedicineImport, $request->file('import_file')); 
        Session::flash('success', 'You have successfully added medicine');
        return back();
    }

    public function export(){
        
        return Excel::download(new MedicineStockExport,'medicinestock.xlsx');
    }
}
