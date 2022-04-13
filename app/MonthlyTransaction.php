<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyTransaction extends Model
{
    protected $fillable=['medicine_id','customer_name','buy_date','quantity','total'];
    
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
