<?php

namespace App\Http\Controllers;

use App\MedicineManufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicineManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = MedicineManufacturer::all();
        return view('manufacturer.index', compact('manufacturer'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('manufacturer.edit',[
            'manufacturer'=>MedicineManufacturer::where('id',$id)->first()
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer_name' => ['required', 'string', 'max:255'],
        ]);

        MedicineManufacturer::create($request->all());
        Session::flash('success', 'You have successfully added a manufacturer name');
        return back();
    }

    public function update(Request $request, $manufacturer_id)
    {
        $manufacturer=MedicineManufacturer::find($manufacturer_id);
        $data = $request->except('_token','_method');
        $manufacturer->update($data);
        return redirect('manufacturer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MedicineManufacturer $medicineManufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicineManufacturer=MedicineManufacturer::find($id);
        $medicineManufacturer->delete();
        return back();
    }
}
