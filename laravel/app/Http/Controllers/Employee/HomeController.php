<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        $employee = Employee::find(Auth::user()->id);
        $employers = Enrollment::where('employee_id', $employee->id)->with('employer')->get()->pluck('employer');

        return view('employee.home', compact('employee', 'employers'));
    }
}
