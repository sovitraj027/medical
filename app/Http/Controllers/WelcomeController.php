<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MonthlyTransaction;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   public function index(){

       return view('admin.index',[
           'available_quantity'=>Medicine::pluck('total_quantity')->sum(),
           'total_sale'=>MonthlyTransaction::pluck('quantity')->sum(),
           'revenue'=>MonthlyTransaction::pluck('total')->sum(),
       ]);
   }
}
