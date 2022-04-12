<?php

namespace App\Http\Controllers;

use App\InvoiceBill;
use App\Medicine;
use App\MedicineStock;
use Illuminate\Http\Request;

class InvoiceBillController extends Controller
{
    public function storeInvoices(Request $request)
    {
        $invoice_bill_number = InvoiceBill::bill();
        $invoice_bill_number->create([
        ]);

        $medicine = Medicine::find($request->medicine_id)->first();

        //decrease medicine qyantity wrt current medicine
        $medicine->decrement('total_quantity', $request->qutantity);

    }

    public function createInvoices()
    {
     
        
        $medicine = Medicine::where('total_quantity','>','0')->get();
      
        return view('transactions.createInvoice', compact('medicine'));
    }

    public function refundInvoices()
    {
       
        $medicine = Medicine::all();
        return view('transactions.refundInvoice', compact('medicine'));
    }

}
