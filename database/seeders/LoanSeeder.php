<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LoanStatus;
use App\Models\LoanInstallment;
use Illuminate\Support\Facades\Schema;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        LoanStatus::truncate();
        $statuses = [
            'PENDING',
            'APPROVED',
            'PAID'
        ];
        $installments = [
            ['type' => '1', 'rate' => 0.4],
            ['type' => '3', 'rate' => 1.0],
            ['type' => '6', 'rate' => 1.4],
            ['type' => '12', 'rate' => 1.4],
        ];
        collect($statuses)->each(function ($data) { LoanStatus::create(['name' => $data]); });
        collect($installments)->each(function ($data) { LoanInstallment::create(['type' => $data['type'], 'rate' => $data['rate']]); });
        Schema::enableForeignKeyConstraints();
    }
}
