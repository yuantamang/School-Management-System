<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $schoolA = School::where('name', 'School A')->first();
        $schoolB = School::where('name', 'School B')->first();

        $adminA = User::firstOrCreate(
            ["email" => 'adminA@gmail.com'],
            [
                'name' => 'Admin A',
                'school_id' => $schoolA->id,
                'password' => Hash::make('password')
            ]
        );

        $adminB = User::firstOrCreate(
            ["email" => 'adminB@gmail.com'],
            [
                'name' => 'School B',
                'school_id' => $schoolB->id,
                'password' => Hash::make('password')
            ]
        );

        $adminRole->syncPermissions(Permission::all());

        $adminA->assignRole($adminRole);
        $adminB->assignRole($adminRole);
    }
}
