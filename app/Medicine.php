<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'id',
        'medicine_name',
        'total_quantity',
        'selling_price',
    ];

    public function medicineStock(){
        return $this->hasMany(MedicineStock::class);
    }
    
    public function medicineTransaction(){
        return $this->hasMany(MonthlyTransaction::class);
    }
}
