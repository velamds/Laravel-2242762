<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $table = "productos";

    function brand(){
        return $this->belongsTo(Brand::class);//Tabla brands campo id relaciona con product.brand_id
    }

    function invoices(){
        return $this->belongsToMany(Invoice::class,'invoice_details');
    }
}
