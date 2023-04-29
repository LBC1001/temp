<?php

namespace App\Http\Controllers\Employee;

use App\Models\Worklog;
use App\Http\Controllers\Controller;
use App\Services\DltService;
use Auth;
use Exception;

class WorklogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data = request()->validate([
            'from' => 'required',
            'until' => 'required',
            'employer_id' => 'required|exists:users,id'
        ]);

        $worklog = Worklog::make();

        $worklog->from = $data["from"];
        $worklog->until = $data["until"];
        $worklog->employer_id = $data["employer_id"];

        $worklog->employee_id = Auth::user()->id;
        $worklog->pre_image = 'from:' . $data['from'] . '|until:' . $data['until'] . '|freelancer:' . $data['employer_id'] . '|employer:' . $data['employer_id'];
        $worklog->hash = hash('sha256', $worklog->pre_image);

        try {
            $dltService = new DltService();
            $dltTransactionId = $dltService->writeHash($worklog->hash, $worklog->pre_image);
            $worklog->dlt_transaction_id = $dltTransactionId;
            $worklog->save();

            return redirect(route('employee.home'))->with('succes', 'De hash is succesvol weggeschreven.');
        } catch (Exception $e) {
            return redirect(route('employee.home'))->with('error', 'Er is een probleem opgetreden bij het wegschrijven van de hash.');
        }
    }

    public function editWorkLog($id)
    {
        $worklog = Worklog::where('id', $id)->first();
        $data = request()->all();
        $this->editWorkLogModel($data, $worklog);

        return redirect(route('employee.home'));
    }

    private function editWorkLogModel($data, $worklog)
    {
        $worklog->from = $data["from"];
        $worklog->until = $data["until"];
        $worklog->save();
    }
}
