<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $school = School::where('name', "School A")->first();
        $school2 = School::where('name', "School B")->first();

        $user = User::firstOrCreate(
            ["email" => "yuantamang@gmail.com"],
            [
                "name" => "Yuan",
                "school_id" => $school->id,
                "password" => Hash::make("password")
            ]
        );

        $user2 = User::firstOrCreate(
            ["email" => "test@gmail.com"],
            [
                "name" => "Test",
                "school_id" => $school2->id,
                "password" => Hash::make("password")
            ]
        );
    }
}
