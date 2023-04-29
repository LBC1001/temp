<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function show(Employee $employee)
    {
        return view('employee', ['employee' => $employee]);
    }
}
