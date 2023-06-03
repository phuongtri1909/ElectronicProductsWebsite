<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'fullName',  
        'email', 
        'phone',  
        'address',
        'note',
        'totalMoney',
        'user_confirmed',
        'admin_confirmed',
    ];
}