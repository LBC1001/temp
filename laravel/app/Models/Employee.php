<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use ReflectionClass;

class Employee extends User
{
    use HasFactory;

    protected $table = 'users';
    protected $guard_name = 'web';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('role', function (Builder $builder) {
            $builder->role('employee');
        });
    }

    protected function getParentClass()
    {
        return (new ReflectionClass($this))->getParentClass()->getName();
    }

    public function getMorphClass()
    {
        return $this->getParentClass();
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function schedule(): HasOne
    {
        return $this->hasOne(Schedule::class);
    }

    public function worklogs(): HasMany
    {
        return $this->hasMany(Worklog::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function isEnrolledAt(Employer $employer)
    {
        return Enrollment::where([
            'employee_id' => $this->id,
            'employer_id' => $employer->id
        ])->count() > 0;
    }
}
