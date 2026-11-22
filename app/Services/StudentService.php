<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function createStudent($name)
    {
        return Student::create([
            'name' => $name
        ]);
    }
}
