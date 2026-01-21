<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('school_id')
                    ->required()
                    ->numeric(),
                Select::make('section_id')
                    ->relationship('section', 'name')
                    ->required(),
                TextInput::make('registration_number')
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('caste')
                    ->default(null),
                TextInput::make('gender')
                    ->required(),
                TextInput::make('admission_no')
                    ->required(),
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
