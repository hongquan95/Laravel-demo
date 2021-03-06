<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $primaryKey = 'payment_id';
    
    protected $fillable = [
        'payment_id',
        'customer_id',
        'staff_id',
        'rental_id',
        'amount',
        'payment_date',
    ];
}
