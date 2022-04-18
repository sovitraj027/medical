<?php

namespace App\Imports;

use App\Medicine;
use App\MedicineManufacturer;
use App\MedicineStock;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use function PHPSTORM_META\type;

class MedicineImport implements ToModel,WithHeadingRow
{
    private $medicine;
    private $manufacturer;

    public function __construct(){
        $this->medicine=Medicine::select('medicine_name','id','selling_price','total_quantity')->get();
        $this->manufacturer=MedicineManufacturer::select('manufacturer_name','id')->get();
    
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!(Medicine::where('medicine_name',$row['medicine_name'])->exists())){
            $request_data=[
                'medicine_name'=>$row['medicine_name'],
                'selling_price'=>$row['selling_price']
            ];
          Medicine::create($request_data);

        }
     
        if(!(MedicineManufacturer::where('manufacturer_name',$row['manufacturer_name'])->exists())){
            $request_data1=[
                'manufacturer_name'=>$row['manufacturer_name']
            ];
           MedicineManufacturer::create($request_data1);
        }
        
       $medicine=Medicine::select('medicine_name','id','selling_price','total_quantity')->where('medicine_name',$row['medicine_name'])->first();
       $manufacturer=MedicineManufacturer::select('manufacturer_name','id')->where('manufacturer_name',$row['manufacturer_name'])->first();
       $date1=Carbon::parse($row['manufactured_date'])->format('Y-m-d');
       $date2=Carbon::parse($row['expiry_date'])->format('Y-m-d');

       $medicine1 = Medicine::where('medicine_name', $row['medicine_name']);
     
       $medicine1->update(['selling_price' => $row['selling_price'],
       'medicine_manufacturer_id'=>$manufacturer->id??null,
    ]);
 
       $medicine1->increment('total_quantity', $row['quantity']);
   
        return new MedicineStock([
            'medicine_id'=>$medicine->id??Null,
            'medicine_manufacturer_id'=>$manufacturer->id??null,
            'supplier_name'=>$row['supplier_name'],
            'manufactured_date'=>$date1,
            'expiry_date'=>$date2,
            'cost_price'=>$row['cost_price'],
            'quantity'=>$row['quantity'],
        ]);
      
      
    }
}
