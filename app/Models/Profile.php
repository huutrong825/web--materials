<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profile';
    protected $fillable=[
        'UserID','Sex','Phone','Birth','Address','Image'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}