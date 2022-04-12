<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineStock;
use App\MonthlyTransaction;
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

    public function viewTransaction()
    {
        return view('transactions.monthlyTransaction');
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

    public function getTransaction(Request $request){
        $medicines=MonthlyTransaction::whereMonth('buy_date',$request->month)->get();
      
          
//         $medicines=MonthlyTransaction::whereMonth('buy_date',$request->month)->get()->toArray();
//         $data=MonthlyTransaction::whereMonth('buy_date',$request->month)->pluck('medicine_id')->toArray();
//          $med=Medicine::whereIn('id',$data)->get()->toArray();
    
//          $merged=array_merge($med,$medicines);
//          dd($merged);  
         
//          foreach($merged as $key=>$merge){
// dd($merge['customer_name']);
        //  }
        return view('transactions.monthlytransaction',[
            'medicines'=>$medicines,
            
        ]);
    }
}
