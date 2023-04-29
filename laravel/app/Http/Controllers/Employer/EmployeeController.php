<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Models\Enrollment;
use App\Models\Schedule;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::role('employee')->get();
        return view('employer', ['employees' => $employees]);
    }

    public function show(Employee $employee)
    {
        $employer = Employer::find(Auth::user()->id);
        return view('employer.employees.show', compact('employee', 'employer',));
    }

    public function create()
    {
        return view('employer.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'email|required|unique:users,email'
            ]
        );

        DB::transaction(function () use ($request) {
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
            $employee->save();
            $employee->assignRole('employee');

            (new Schedule)->createSchedule($employee, $request->all());
            (new Enrollment)->enroll($employee, Employer::find(Auth::user()->id));
        });

        return redirect(route('employer.home'));
    }

    public function edit(Employee $employee)
    {
        $schedule = Schedule::where('employee_id', $employee->id)->first();
        return view('employer.employees.edit', compact('employee', 'schedule'));
    }

    public function update(Employee $employee, Request $request)
    {
        $schedule = Schedule::where('employee_id', $employee->id)->first();

        if ($schedule != null) {
            (new Schedule)->updateSchedule($schedule, $request->all());
        } else {
            (new Schedule)->createSchedule($employee->id, $request->all());
        }
        Employee::find($employee->id)->update($request->all());

        return redirect(route('employer.employees.show', ['employee' => $employee->id]));
    }
}
