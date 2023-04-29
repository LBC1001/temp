<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $employees = Employee::all();
        return view('Employer.home', ['employees' => $employees]);

        /*$employees = Employee::all();
        ;*/
    }
}
