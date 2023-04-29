<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worklog extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'until', 'employee_id'];
    protected $dates = ['created_at', 'updated_at', 'from', 'until'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
