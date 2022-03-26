<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineManufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicineController extends Controller
{

    public function index()
    {
        $medicineManufacturer = MedicineManufacturer::all();
        $medicine = Medicine::all();
        return view('/medicine.addMedicine', compact('medicineManufacturer', 'medicine'));
    }

    public function viewMedicine()
    {
        $medicine = Medicine::all();
        return view('medicine/viewMedicine', compact('medicine'));
    }


    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'medicine_name' => ['required', 'string', 'max:255'],
        ]);

        Medicine::create($request->all());

        Session::flash('success', 'You have successfully added medicine');
        return back();
    }


    public function show(Medicine $medicine)
    {
        //
    }

    public function edit(Medicine $medicine)
    {
        return view('medicine.edit',[
            'medicine'=>$medicine
        ]
    );
    }


    public function update(Request $request, Medicine $medicine)
    {
 
        $data = $request->except('_token','_method');
        $medicine->update($data);
        return redirect('medicine/view');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect('medicine/view');
    }
}
