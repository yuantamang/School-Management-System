<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('class_id')
                    ->required()
                    ->numeric(),
                TextInput::make('academic_year_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
