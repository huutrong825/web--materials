<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="Product";
    public $timestamps=false;
    protected $primaryKey = 'ProductID';
	protected $fillable=['ProductID','ProductName','Title','Price','Unit','Quanity','Image','CategoryID'];
    public function Category()
    {
        return $this->belongsTo(Category::class,"CategoryID","CategoryID");
    }

    
}
