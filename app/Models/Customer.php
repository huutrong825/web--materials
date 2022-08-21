<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        "Name","Sex","Email","Address","Phone","Note"
    ];
    protected $table="Customer";
    public function Users(){
        return $this->belongsTo(Users::class,"UserID","UserID");
    }

    public function OrderBill(){
        return $this->hasMany(OrderBill::class,'CusID','CusID');
    }
}
