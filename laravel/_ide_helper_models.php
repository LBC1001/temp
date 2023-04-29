<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $company
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employer|null $employer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Enrollment[] $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Schedule|null $schedule
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Worklog[] $worklogs
 * @property-read int|null $worklogs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employer
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $company
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employer
 * @property-read int|null $employer_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereUpdatedAt($value)
 */
	class Employer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Enrollment
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $employee_id
 * @property int $employer_id
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Employer $employer
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEmployerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
 */
	class Enrollment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Schedule
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $employee_id
 * @property string|null $monday_am_start_time
 * @property string|null $monday_am_end_time
 * @property string|null $monday_pm_start_time
 * @property string|null $monday_pm_end_time
 * @property string|null $tuesday_am_start_time
 * @property string|null $tuesday_am_end_time
 * @property string|null $tuesday_pm_start_time
 * @property string|null $tuesday_pm_end_time
 * @property string|null $wednesday_am_start_time
 * @property string|null $wednesday_am_end_time
 * @property string|null $wednesday_pm_start_time
 * @property string|null $wednesday_pm_end_time
 * @property string|null $thursday_am_start_time
 * @property string|null $thursday_am_end_time
 * @property string|null $thursday_pm_start_time
 * @property string|null $thursday_pm_end_time
 * @property string|null $friday_am_start_time
 * @property string|null $friday_am_end_time
 * @property string|null $friday_pm_start_time
 * @property string|null $friday_pm_end_time
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFridayAmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFridayAmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFridayPmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFridayPmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereMondayAmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereMondayAmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereMondayPmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereMondayPmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereThursdayAmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereThursdayAmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereThursdayPmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereThursdayPmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTuesdayAmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTuesdayAmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTuesdayPmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTuesdayPmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereWednesdayAmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereWednesdayAmStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereWednesdayPmEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereWednesdayPmStartTime($value)
 */
	class Schedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ScheduleTiming
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleTiming newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleTiming newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleTiming query()
 */
	class ScheduleTiming extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $company
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Worklog
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $employee_id
 * @property int $employer_id
 * @property string|null $pre_image
 * @property string|null $hash
 * @property string|null $dlt_transaction_id
 * @property \Illuminate\Support\Carbon $from
 * @property \Illuminate\Support\Carbon $until
 * @property-read \App\Models\Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereDltTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereEmployerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog wherePreImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worklog whereUpdatedAt($value)
 */
	class Worklog extends \Eloquent {}
}

