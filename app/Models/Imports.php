<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imports extends Model
{
    use HasFactory;
    protected $fillable=["SupID","UserID","Date"];
    protected $table='importbill';
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Suppliers(){
        return $this->belongsToMany(Suppliers::class);
    }
}