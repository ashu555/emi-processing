<?php

namespace App\Repositories;

use App\Models\LoanDetail;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LoanRepository implements LoanRepositoryInterface
{
    public function getAllLoans()
    {
        return LoanDetail::all();
    }

    public function getDateRanges()
    {
        return DB::select("
            SELECT MIN(first_payment_date) as min_date,
                   MAX(last_payment_date) as max_date
            FROM loan_details
        ")[0];
    }
}