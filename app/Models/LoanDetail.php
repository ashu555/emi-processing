<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
     protected $table = 'loan_details';
    protected $primaryKey = 'clientid';
    
    protected $fillable = [
        'clientid',
        'num_of_payment',
        'first_payment_date',
        'last_payment_date',
        'loan_amount',
    ];

    protected $casts = [
        'first_payment_date' => 'date',
        'last_payment_date' => 'date',
        'loan_amount' => 'decimal:2',
    ];
}
