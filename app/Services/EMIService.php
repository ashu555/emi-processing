<?php

namespace App\Services;

use App\Repositories\Interfaces\EMIRepositoryInterface;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Carbon\Carbon;

class EMIService
{
    protected $emiRepository;
    protected $loanRepository;
    protected $loanService;

    public function __construct(
        EMIRepositoryInterface $emiRepository,
        LoanRepositoryInterface $loanRepository,
        LoanService $loanService
    ) {
        $this->emiRepository = $emiRepository;
        $this->loanRepository = $loanRepository;
        $this->loanService = $loanService;
    }

    public function processEMIData()
    {
        // Get month columns
        $columns = $this->loanService->getMonthColumns();
        
        // Create EMI table
        $this->emiRepository->createEMITable($columns);
        
        // Process each loan
        $loans = $this->loanRepository->getAllLoans();
        foreach ($loans as $loan) {
            $this->processLoanEMI($loan, $columns);
        }
        
        return $this->emiRepository->getEMIData();
    }

    protected function processLoanEMI($loan, $columns)
	{
	    $emiAmount = $loan->loan_amount / $loan->num_of_payment;
	    $startDate = Carbon::parse($loan->first_payment_date)->startOfDay();
	    $endDate = Carbon::parse($loan->last_payment_date)->startOfDay();
	    
	    $emiData = ['clientid' => $loan->clientid];
	    $remainingAmount = $loan->loan_amount;
	    $paymentsLeft = $loan->num_of_payment;
	    
	    foreach ($columns as $column) {
	        // Parse the column date based on year and month only
	        $columnDate = Carbon::createFromFormat('Y_M', $column)->startOfMonth();

	        // Compare only the year and month for accuracy
	        if (
	            $columnDate->year == $startDate->year && $columnDate->month == $startDate->month ||
	            ($columnDate->greaterThanOrEqualTo($startDate) && $columnDate->lessThanOrEqualTo($endDate))
	        ) {
	            if ($paymentsLeft == 1) {
	                // Last payment - adjust for any rounding differences
	                $emiData[$column] = $remainingAmount;
	            } else {
	                $emiData[$column] = $emiAmount;
	                $remainingAmount -= $emiAmount;
	            }
	            $paymentsLeft--;
	        } else {
	            $emiData[$column] = 0;
	        }
	    }
	    
	    // Insert the EMI data into the repository
	    $this->emiRepository->insertEMIData($emiData);
}

}
