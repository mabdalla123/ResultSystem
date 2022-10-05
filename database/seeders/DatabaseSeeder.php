<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Enums\UserType;
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
            'password' => bcrypt('admin123'),
            'UserType' => UserType::ADMIN,
        ]);


        $dept = Department::factory()->create();

        Student::factory([
            "department_id" => $dept->id
        ])->count(10)->create();

        $acadimicyear = AcadimicYear::factory([
            "department_id" => $dept->id
        ])->create();

        $Semester = Semester::factory([
            "acadimic_year_id" => $acadimicyear->id
        ])->create();

        Subject::factory([
            "semester_id" => $Semester->id,
            "certified_hours" => 3
        ])->count(4)->create();
    }
}
