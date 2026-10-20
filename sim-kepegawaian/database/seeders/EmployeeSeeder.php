<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $it = Department::where('name', 'Teknologi Informasi')
            ->firstOrFail()->id;
        $hr = Department::where('name', 'Sumber Daya Manusia')
            ->firstOrFail()->id;
        $finance = Department::where('name', 'Keuangan')
            ->firstOrFail()->id;

        $employees = [
            [$it, 'Andi Saputra', 'Backend Developer', 8000000, '2022-03-01'],
            [$it, 'Budi Santoso', 'Frontend Developer', 7500000, '2023-01-15'],
            [$hr, 'Citra Lestari', 'HR Specialist', 6500000, '2021-07-10'],
            [$finance, 'Dian Permata', 'Akuntan', 7000000, '2020-11-20'],
            [$hr, 'Eko Prasetyo', 'Recruiter', 6000000, '2024-02-05'],
        ];

        foreach ($employees as $e) {
            Employee::firstOrCreate(
                ['name' => $e[1]],
                [
                    'department_id' => $e[0],
                    'position' => $e[2],
                    'salary' => $e[3],
                    'joined_at' => $e[4],
                ]
            );
        }
    }
}