<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function status_name()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
