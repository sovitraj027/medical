<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineStock;
use Illuminate\Http\Request;

class SearchMedicineController extends Controller
{
    public function index()
    {
        return view('medicine.searchMedicine');
    }

    public function stock()
    {
        return view('medicine.searchStock');
    }


    public function search(Request $request)
    {      
         $medicine = Medicine::where('medicine_name', 'like', $request->name . '%')->get();
         return view('medicine.searchMedicine',[
         'medicine'=>$medicine,
         ]);          
    }

     public function getStock(Request $request){
       
            $stock= MedicineStock::where('expiry_date', 'like', $request->expiry_date . '%')->get();
            return view('medicine.searchStock',[
                'medicine'=>$stock,
            ]);
        }
}
