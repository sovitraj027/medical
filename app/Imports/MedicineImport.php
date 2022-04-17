<?php

namespace App\Imports;

use App\Medicine;
use App\MedicineManufacturer;
use App\MedicineStock;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicineImport implements ToModel,WithHeadingRow
{
    private $medicine;
    private $manufacturer;

    public function __construct(){
        $this->medicine=Medicine::select('medicine_name')->get();
        $this->manufacturer=MedicineManufacturer::select('manufacturer_name')->get();
    
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       $medicine=$this->medicine->where('medicine_name',$row['medicine_name'])->first();
       $manufacturer=$this->manufacturer->where('manufacturer_name',$row['manufacturer_name'])->first();
       $date1=Carbon::parse($row['manufactured_date'])->format('d-m-Y');
    // dd($row['manufactured_date']); 
       $date2=Carbon::parse($row['expiry_date'])->format('Y-m-d');
   
        return new MedicineStock([
            'medicine_id'=>$medicine->id??Null,
            'medicine_manufacturer_id'=>$manufacturer->id??null,
            'supplier_name'=>$row['supplier_name'],
            'manufactured_date'=>$date1,
            'expiry_date'=>$date2,
            'cost_price'=>$row['cost_price'],
            'quantity'=>$row['quantity'],
        ]);
        $medicine = Medicine::where('medicine_name', $row['medicine_name']);
        $medicine->update(['selling_price' => $row['selling_price']]);
        $medicine->increment('total_quantity', $row['quantity']);

    }
}
