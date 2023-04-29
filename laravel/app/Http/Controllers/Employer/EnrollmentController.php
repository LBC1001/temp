<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employer;
use App\Services\EnrollmentService;
use Auth;
use Exception;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{
    public function enroll(Employee $employee): RedirectResponse
    {
        $employer = $this->getEmployer();


        try {
            (new EnrollmentService($employer))->enroll($employee);
            return back()->with('success', 'De enrollment is succesvol toegepast');
        } catch (Exception $e) {
            return back()->with('error', 'Er ging iets mis bij het toekennen van de enrollment');
        }
    }

    public function unEnroll(Employee $employee): RedirectResponse
    {
        $employer = $this->getEmployer();

        try {
            (new EnrollmentService($employer))->unenroll($employee);
            return back()->with('success', 'De enrollment is succesvol verwijderd');
        } catch (Exception $e) {
            return back()->with('error', 'Er ging iets mis bij het verwijderen van de enrollment');
        }
    }

    private function getEmployer(): Employer
    {
        return Employer::find(Auth::user()->id);
    }
}
