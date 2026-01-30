<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            'schools',
            'users',
            'students',
            'teachers',
            'classes',
            'sections',
            'subjects',
            'academic years',
            'exams',
            'enrollments',
        ];

        $actions = [
            'view',
            'create',
            'update',
            'delete',
        ];

        foreach ($resources as $resource) {
            foreach ($actions as $action)
                {
                    Permission::firstOrCreate([
                        'name' => "{$action} {$resource}",
                        'guard_name' => 'web'
                    ]);
                }
        }
    }
}
