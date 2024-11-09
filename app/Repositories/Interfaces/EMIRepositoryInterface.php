<?php

namespace App\Repositories\Interfaces;

interface EMIRepositoryInterface
{
    public function createEMITable(array $columns);
    public function insertEMIData(array $data);
    public function getEMIData();
}
