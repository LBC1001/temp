<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'log work']);
        Permission::create(['name' => 'edit schedules']);

        $employeeRole = Role::create(['name' => 'employee']);
        $employerRole = Role::create(['name' => 'employer']);

        $employeeRole->givePermissionTo('log work');
        $employerRole->givePermissionTo('edit schedules');

        $employerUser = User::factory()->create([
            'first_name' => 'Alice',
            'last_name' => 'McEmploy',
            'company' => 'Company Inc.',
            'email' => 'employer@company.com',
            'password' => Hash::make('password')
        ]);
        $employerUser->assignRole($employerRole);

        $employeeUser = User::factory()->create([
            'first_name' => 'Bob',
            'last_name' => 'McFreelance',
            'company' => 'Freelance Inc.',
            'email' => 'employee@freelance.com',
            'password' => Hash::make('password')
        ]);
        $employeeUser->assignRole($employeeRole);

        Enrollment::create([
            'employee_id' => $employeeUser->id,
            'employer_id' => $employerUser->id
        ]);
        Schedule::create([
            'employee_id' => $employeeUser->id
        ]);
    }
}
