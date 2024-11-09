<?php
namespace App\Repositories\Interfaces;

interface LoanRepositoryInterface
{
    public function getAllLoans();
    public function getDateRanges();
}