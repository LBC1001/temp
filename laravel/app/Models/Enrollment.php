<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'employer_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function enroll(Employee $employee, Employer $employer)
    {
        Enrollment::create([
            'employee_id' => $employee->id,
            'employer_id' => $employer->id
        ]);
    }

    public function unEnroll($employeeId, $employerId)
    {
        Enrollment::where([
            'employee_id' => $employeeId,
            'empoyer_id' => $employerId
        ])->each(function (Enrollment $enrollment) {
            $enrollment->delete();
        });
    }
}
