<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcadimicYear;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password'=>Hash::make('admin123')
        ]);



        // Student::factory()->hasDepartment(1)->hasAcadimicYear(1)->create();
        // Student::factory()->hasDepartment(1)->hasAcadimicYear(1)->create();
        $dept=Department::factory()->create();
        Student::factory([
            "department_id"=>$dept->id
        ])->count(10)->create();

        $acadimicyear = AcadimicYear::factory([
            "department_id"=>$dept->id,
            "current"=>true
        ])->create();
//
//
        $Semester =Semester::factory([
            "acadimic_year_id"=>$acadimicyear->id
        ])->create();

        Subject::factory([
            "semester_id"=>$Semester->id
        ])->count(4)->create();





    }
}
