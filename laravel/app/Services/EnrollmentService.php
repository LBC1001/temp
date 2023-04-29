<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Enrollment;

class EnrollmentService
{
    private Employer $employer;

    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
    }

    public function enroll(Employee $employee): Enrollment
    {
        $enrollment = Enrollment::firstOrCreate([
            'employee_id' => $employee->id,
            'employer_id' => $this->employer->id
        ]);
        return $enrollment;
    }

    public function unEnroll(Employee $employee): void
    {
        Enrollment::where([
            'employee_id' => $employee->id,
            'employer_id' => $this->employer->id
        ])->each(function (Enrollment $enrollment) {
            $enrollment->delete();
        });
    }
}
