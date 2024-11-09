<?php

namespace App\Http\Controllers;

use App\Services\LoanService;
use App\Services\EMIService;

class LoanController extends Controller
{
    protected $loanService;
    protected $emiService;

    public function __construct(LoanService $loanService, EMIService $emiService)
    {
        $this->loanService = $loanService;
        $this->emiService = $emiService;
    }

    public function index()
    {
        $loans = $this->loanService->getAllLoans();
        return view('loans.index', compact('loans'));
    }

    public function process()
    {
        return view('loans.process');
    }

    public function processEMI()
    {
        $emiData = $this->emiService->processEMIData();
        return view('loans.process', compact('emiData'));
    }
}