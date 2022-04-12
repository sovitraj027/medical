<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineStock extends Model
{
    protected $fillable = [
        'medicine_name',
        'manufacturer_name',
        'supplier_name',
        'manufactured_date',
        'expiry_date',
        'cost_price',
        'quantity'
    ];

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
