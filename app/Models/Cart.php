<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','product_id','quantity','price','sub_total','status'
    ];
    public function menu_item()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
