<?php

namespace App\Services;

use App\Models\LoanDetail;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Carbon\Carbon;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function getAllLoans()
    {
        return $this->loanRepository->getAllLoans();
    }

    public function getMonthColumns()
    {
        $dateRanges = $this->loanRepository->getDateRanges();
        $startDate = Carbon::parse($dateRanges->min_date);
        $endDate = Carbon::parse($dateRanges->max_date);
        $columns = [];
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $columns[] = $currentDate->format('Y_M');
            $currentDate->addMonth();
        }
        
        return $columns;
    }

    // public function processEMIData()
    // {
    // 	$minDate = LoanDetail::min('first_payment_date');
	//     $maxDate = LoanDetail::max('last_payment_date');
	    
	//     DB::statement('DROP TABLE IF EXISTS emi_details');
	//     $columns = $this->generateDynamicColumns($minDate, $maxDate);
	//     $createTableQuery = "CREATE TABLE emi_details (clientid INT, " . implode(', ', $columns) . ")";
	    
	//     DB::statement($createTableQuery);
	//     $this->populateEMIDetails($minDate, $maxDate);
	    
	//  }


	// private function generateDynamicColumns($minDate, $maxDate)
	// {
	//     $columns = [];
	//     $currentDate = \Carbon\Carbon::parse($minDate)->startOfMonth();
	//     $endDate = \Carbon\Carbon::parse($maxDate)->endOfMonth();

	//     while ($currentDate <= $endDate) {
	//         $columns[] = $currentDate->format('Y_M') . ' DECIMAL(10, 2) DEFAULT 0.00';
	//         $currentDate->addMonth();
	//     }
	    
	//     return $columns;
	// }


	// private function populateEMIDetails($minDate, $maxDate)
	// {
	//     $loans = LoanDetail::all();

	//     foreach ($loans as $loan) {
	//         $emiAmount = round($loan->loan_amount / $loan->num_of_payment, 2);
	//         $emiData = ['clientid' => $loan->clientid];

	//         // Generate EMI payment schedule
	//         $currentDate = \Carbon\Carbon::parse($loan->first_payment_date)->startOfMonth();
	//         $endPaymentDate = \Carbon\Carbon::parse($loan->last_payment_date)->endOfMonth();
	//         $remainingAmount = $loan->loan_amount;
	        
	//         for ($i = 0; $i < $loan->num_of_payment && $currentDate <= $endPaymentDate; $i++) {
	//             $columnName = $currentDate->format('Y_M');

	//             // Ensure the final payment amount matches the total loan amount
	//             $monthlyPayment = ($i === $loan->num_of_payment - 1) ? $remainingAmount : $emiAmount;
	//             $emiData[$columnName] = $monthlyPayment;
	//             $remainingAmount -= $monthlyPayment;

	//             $currentDate->addMonth();
	//         }

	//         // Insert into emi_details table
	//         DB::table('emi_details')->insert($emiData);
	//     }
	// }


}