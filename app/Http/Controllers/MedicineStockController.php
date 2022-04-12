<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineStock;
use App\MonthlyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicineStockController extends Controller
{

    public function stockStore(Request $request)
    {

        $this->validate($request, [
            'supplier_name' => ['required', 'string', 'max:255'],
            'manufacturer_name' => ['required', 'string', 'max:255'],
            'medicine_name' =>  ['required', 'string', 'max:255'],
            'manufactured_date' => ['required', 'string', 'max:255'],
            'expiry_date' => ['required', 'string', 'max:255'],
            'cost_price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        $medicine = Medicine::where('medicine_name', $request->medicine_name);
        $medicine->update(['selling_price' => $request->selling_price]);
        unset($request['selling_price']);
        MedicineStock::create($request->all());
        $medicine->increment('total_quantity', $request->quantity);
        Session::flash('success', 'You have successfully added medicine');
        return back();
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
    $requestData['customer_name']=$request->customer_name;
    $requestData['buy_date']=$request->date;
    $requestData['medicine_id']=$medicine['id'];
    $requestData['quantity']=$medicine[0];
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
