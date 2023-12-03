<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $studentClasses=[
            'Class 1',
            'Class 2',
            'Class 3',
            'Class 4',
           ' Class 5',
        ];
        foreach ($studentClasses as $studentClass) {
            StudentClass::create(['title' => $studentClass]);
        }
    }
}
