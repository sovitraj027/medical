<?php

namespace App\Http\Controllers;

use App\Imports\MedicineImport;
use App\Medicine;
use App\MedicineStock;
use App\MonthlyTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MedicineStockController extends Controller
{

    public function stockStore(Request $request)
    {
        //validate
        $this->validate($request, [
            'supplier_name' => ['required', 'string', 'max:255'],
            'medicine_manufacturer_id' => ['required', 'exists:medicine_manufacturers,id'],
            'medicine_id' => ['required', 'exists:medicines,id'],
            'manufactured_date' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'cost_price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        $medicine = Medicine::where('id', $request->medicine_id);
        $medicine->update(['selling_price' => $request->selling_price]);

        unset($request['selling_price']);

        MedicineStock::create($request->all());
        $medicine->increment('total_quantity', $request->quantity);

        return redirect()->back()->with('success', 'Cancel denied. Please contact your librarian');
    }

    public function createInvoice(Request $request){
     $total=0;
     $medicines=Medicine::whereIn('id',$request->medicine_id)->get()->toArray();
     $qty=$request->qty;
     foreach($medicines as $key => $medicine){
         $total+=$medicine['selling_price']*$qty[$key];
    foreach($qty as $k=>$q){

    if($key==$k){
        array_push($medicines[$key],$q);
    }
    
    }      
    }
    foreach($medicines as $medicine){
        $medicine=Medicine::where('id',$medicine['id'])->decrement('total_quantity',$medicine[0]);
    } 
       
   foreach($medicines as $medicine)
   { 
    $formatedDate=Carbon::parse($request->date)->format('Y/m/d');
    $requestData['customer_name']=$request->customer_name;
    $requestData['buy_date']=$formatedDate;
    $requestData['medicine_id']=$medicine['id'];
    $requestData['quantity']=$medicine[0];
    $requestData['total']=$medicine['selling_price']*$medicine[0];
    MonthlyTransaction::create($requestData);
}

  return view('transactions.invoice',[
      'customer_name'=>$request->customer_name,
      'contact'=>$request->contact,
      'discount'=>$request->discount,
      'paid_amount'=>$request->paidAmount,
      'quantity'=>$request->qty,
      'date'=>$request->date,
      'medicines'=>$medicines,
      'total'=>$total

  ]);
 }

    public function returnInvoice(Request $request){
        $total=0;
        $medicines=Medicine::whereIn('id',$request->medicine_id)->get()->toArray();
        $qty=$request->qty;
        foreach($medicines as $key => $medicine){
            $total+=$medicine['selling_price']*$qty[$key];
       foreach($qty as $k=>$q){
   
       if($key==$k){
           array_push($medicines[$key],$q);
       }
       
       }      
       }
       foreach($medicines as $medicine){
        $medicine=Medicine::where('id',$medicine['id'])->increment('total_quantity',$medicine[0]);
    } 

       return view('transactions.returnInvoice',[
        'customer_name'=>$request->customer_name,
        'contact'=>$request->contact,
        'quantity'=>$request->qty,
        'date'=>$request->date,
        'medicines'=>$medicines,
        'total'=>$total
  
    ]);
       
    }
   
 


}
