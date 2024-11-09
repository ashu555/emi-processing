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

}