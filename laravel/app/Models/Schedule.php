<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'monday_am_start_time',
        'monday_am_end_time',
        'monday_pm_start_time',
        'monday_pm_end_time',
        'tuesday_am_start_time',
        'tuesday_am_end_time',
        'tuesday_pm_start_time',
        'tuesday_pm_end_time',
        'wednesday_am_start_time',
        'wednesday_am_end_time',
        'wednesday_pm_start_time',
        'wednesday_pm_end_time',
        'thursday_am_start_time',
        'thursday_am_end_time',
        'thursday_pm_start_time',
        'thursday_pm_end_time',
        'friday_am_start_time',
        'friday_am_end_time',
        'friday_pm_start_time',
        'friday_pm_end_time',
        'employee_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createSchedule(Employee $employee, $data)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        $schedule = new Schedule();

        for ($i = 0; $i < 5; $i++) {
            $schedule[$daysOfWeek[$i] . '_am_start_time'] = $data["vmvan" . $i];
            $schedule[$daysOfWeek[$i] . '_am_end_time'] = $data["vmtot" . $i];
            $schedule[$daysOfWeek[$i] . '_pm_start_time'] = $data["nmvan" . $i];
            $schedule[$daysOfWeek[$i] . '_pm_end_time'] = $data["nmtot" . $i];
        }
        $schedule->employee_id = $employee->id;
        $schedule->save();
    }

    public function updateSchedule(Schedule $schedule, $data)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        for ($i = 0; $i < 5; $i++) {
            $schedule[$daysOfWeek[$i] . '_am_start_time'] = $data["vmvan" . $i];
            $schedule[$daysOfWeek[$i] . '_am_end_time'] = $data["vmtot" . $i];
            $schedule[$daysOfWeek[$i] . '_pm_start_time'] = $data["nmvan" . $i];
            $schedule[$daysOfWeek[$i] . '_pm_end_time'] = $data["nmtot" . $i];
        }
        $schedule->save();
    }
}
