<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EMIRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EMIRepository implements EMIRepositoryInterface
{
    public function createEMITable(array $columns)
    {
        // Drop table if exists
        DB::statement('DROP TABLE IF EXISTS emi_details');

        // Create columns definition
        $columnDefinitions = ['clientid VARCHAR(255)'];
        foreach ($columns as $column) {
            $columnDefinitions[] = "`$column` DECIMAL(10,2) DEFAULT 0.00";
        }

        // Create table
        $sql = "CREATE TABLE emi_details (" . implode(',', $columnDefinitions) . ")";
        DB::statement($sql);
    }

    public function insertEMIData(array $data)
    {
        return DB::table('emi_details')->insert($data);
    }

    public function getEMIData()
    {
        return DB::table('emi_details')->get();
    }
}