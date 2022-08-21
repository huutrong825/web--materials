<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBill extends Model
{
    use HasFactory;
    protected $fillable=[
        "CusID","Order_date","TotalPrice","Payment","Note"
    ];
    protected $table="orderbill";
    public function Customer(){
        return $this->belongsTo(Customer::class,'CusID','CusID');
    }
}
